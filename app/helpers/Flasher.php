<?php 

class Flasher {

    public static function setFlash($message, $type) {
        $_SESSION['notice'] = [
            'message' => $message,
            'type' => $type
        ];
    }

    public static function flash() {
        if (isset($_SESSION['notice'])) {
            if ($_SESSION['notice']['type'] == 'danger') {
                echo ' 
                <div class="alert alert-' . $_SESSION['notice']['type'] . ' alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-icon">
                        <i class="far fa-fw fa-bell"></i>
                    </div>
                    <div class="alert-message">
                        ' . $_SESSION['notice']['message'] . '
                    </div>
                </div>
                ';
            } else {
                echo '
                <div class="alert alert-' . $_SESSION['notice']['type'] . ' alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-icon">
                        <i class="far fa-fw fa-bell"></i>
                    </div>
                    <div class="alert-message">
                        ' . $_SESSION['notice']['message'] . '
                    </div>
                </div>
                ';
            }
            unset($_SESSION['notice']);
        }
    }

   
    
    public static function setNotyf($message, $type) {
        $_SESSION['notyf'] = [
            'message' => $message,
            'type' => $type,
        ];
    }

    public static function notyf() {
        if (isset($_SESSION['notyf'])) {
            if ($_SESSION['notyf']['type'] == 'danger') {
                echo "
                    <script>
                        var notyf = new Notyf({
                            ripple: true,
                            dismissible: true,
                            duration: 5000,
                            position: {
                                x: 'right',
                                y: 'top',
                            }
                        });
                        notyf." . $_SESSION['notyf']['type'] . "(" . $_SESSION['notyf']['message'] . ")
                    </script>
                ";
            } else {
                echo "
                    <script>
                        var notyf = new Notyf({
                            ripple: true,
                            dismissible: true,
                            duration: 5000,
                            position: {
                                x: 'right',
                                y: 'top',
                            }
                        });
                        notyf." . $_SESSION['notyf']['type'] . "('" . $_SESSION['notyf']['message'] . "')
                    </script>
                ";
            }
            unset($_SESSION['notyf']);
        }
    }

}