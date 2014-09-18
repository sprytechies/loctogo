<?php

namespace console\controllers;
    use yii\BaseYii as Yii;
    use yii\console\Controller;
    use resque\lib\ResqueAutoloader;
    use resque\lib\Resque\Resque_Worker;
    /**
     *
     * @author Sprytechies
     * @since 2.0
     */
    class ResqueController extends Controller
    {
        /**
         * This command echoes what you have entered as the message.
         * @param string $message the message to be echoed.
         */
        public function actionIndex()
        {

                $includeFiles=getenv('INCLUDE_FILES');
                if ($includeFiles) {
                    $includeFiles = explode(',', $includeFiles);
                    foreach ($includeFiles as $file) {
                        require_once $file;
                    }
                }
                if(file_exists(Yii::getAlias('@app') . '/config/console.php')){
                    // Yii2-Basic
                    $config = require(Yii::getAlias('@app') . '/config/console.php');
                
                }
                else {
                    // Yii2-Advance
                    $config = require(Yii::getAlias('@app') . '/config/main.php');
                        
                }
                $application = new \yii\console\Application($config);

                # Turn off our amazing library autoload
                spl_autoload_unregister(array('Yii','autoload'));

                if(file_exists(Yii::getAlias('@vendor') . '/resque/yii2-resque/ResqueAutoloader.php')){
                    // Yii2-Basic
                    require_once(Yii::getAlias('@vendor') . '/resque/yii2-resque/ResqueAutoloader.php');
                
                }
                else {
                    // Yii2-Advance
                    require_once(Yii::getAlias('@app') . '/../vendor/resque/yii2-resque/ResqueAutoloader.php');
                
                        
                }
                ResqueAutoloader::register();

                # Give back the power to Yii
                spl_autoload_register(array('Yii','autoload'));

                $QUEUE = getenv('QUEUE');
                if(empty($QUEUE)) {
                    die("Set QUEUE env var containing the list of queues to work.\n");
                }

                $REDIS_BACKEND = getenv('REDIS_BACKEND');
                $REDIS_BACKEND_DB = getenv('REDIS_BACKEND_DB');
                $REDIS_AUTH = getenv('REDIS_AUTH');

                if(!empty($REDIS_BACKEND)) {
                    $REDIS_BACKEND_DB = (!empty($REDIS_BACKEND_DB)) ? $REDIS_BACKEND_DB : 0;
                    Resque::setBackend($REDIS_BACKEND, $REDIS_BACKEND_DB, $REDIS_AUTH);
                }

                $logLevel = 0;
                $LOGGING = getenv('LOGGING');
                $VERBOSE = getenv('VERBOSE');
                $VVERBOSE = getenv('VVERBOSE');
                if(!empty($LOGGING) || !empty($VERBOSE)) {
                    $logLevel = Resque_Worker::LOG_NORMAL;
                } else if(!empty($VVERBOSE)) {
                    $logLevel = Resque_Worker::LOG_VERBOSE;
                }

                $logger = null;
                $LOG_HANDLER = getenv('LOGHANDLER');
                $LOG_HANDLER_TARGET = getenv('LOGHANDLERTARGET');

                if (class_exists('MonologInit_MonologInit')) {
                    if (!empty($LOG_HANDLER) && !empty($LOG_HANDLER_TARGET)) {
                        $logger = new MonologInit_MonologInit($LOG_HANDLER, $LOG_HANDLER_TARGET);
                    } else {
                        fwrite(STDOUT, '*** loghandler or logtarget is not set.'."\n");    
                    }
                } else {
                    fwrite(STDOUT, '*** MonologInit_MonologInit logger cannot be found, continue without loghandler.'."\n");
                }

                $interval = 5;
                $INTERVAL = getenv('INTERVAL');
                if(!empty($INTERVAL)) {
                    $interval = $INTERVAL;
                }

                $count = 1;
                $COUNT = getenv('COUNT');
                if(!empty($COUNT) && $COUNT > 1) {
                    $count = $COUNT;
                }

                $PREFIX = getenv('PREFIX');
                if(!empty($PREFIX)) {
                    fwrite(STDOUT, '*** Prefix set to '.$PREFIX."\n");
                    Resque::redis()->prefix($PREFIX);
                }

                if($count > 1) {
                    for($i = 0; $i < $count; ++$i) {
                        $pid = Resque::fork();
                        if($pid == -1) {
                            die("Could not fork worker ".$i."\n");
                        }
                        // Child, start the worker
                        else if(!$pid) {
                            startWorker($QUEUE, $logLevel, $logger, $interval);
                            break;
                        }
                    }
                }
                // Start a single worker
                else {
                    $PIDFILE = getenv('PIDFILE');
                    if ($PIDFILE) {
                        file_put_contents($PIDFILE, getmypid()) or
                            die('Could not write PID information to ' . $PIDFILE);
                    }

                    $this->startWorker($QUEUE, $logLevel, $logger, $interval);
                }
        }

        function startWorker($QUEUE, $logLevel, $logger, $interval)
        {
            $queues = explode(',', $QUEUE);
            $worker = new Resque_Worker($queues);

            if (!empty($logger)) {
                $worker->registerLogger($logger);    
            } else {
                fwrite(STDOUT, '*** Starting worker '.$worker."\n");
            }

            $worker->logLevel = $logLevel;
            $worker->work($interval);
        }
    }
