<?php
    require_once(__DIR__."/../functions.php");
    class Notification{
        public string $type;
        public bool $display;
        public string $message;
        private static self $instance;

        public static function getInstance(){
            if(!isset(self::$instance)){
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct(string $type = "", bool $display = false, string $message = ""){
            $this->type = $type;
            $this->display = $display;
            $this->message = $message;
        }

        public function generate(Notification $notification = null){
            if($notification){
                $notificationTemplate = getTemplate("notification.html", "templates/notifications/");
            
                $output = parseTemplate($notificationTemplate, [
                    'type' => $notification->type,
                    'display'=> $notification->display ? "":"hidden",
                    'message' => $notification->message
                ]);
                

                return $output;
            }else{
                return "";
            }
            
        }
    }
?>