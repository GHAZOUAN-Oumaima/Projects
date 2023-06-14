<?php
    class viewform {
        public function __construct() {
            // Constructeur vide
        }

        public function displayForm($form) {
            echo "<html>\n";
            echo "<head>\n";
            echo "<title>$form</title>\n";
            echo "</head>\n";
            echo "<body>\n";
            echo "<h1>$form</h1>\n";
            echo "<form method='post' action='../controller/control.inc.php'>\n";
            echo "<input type='hidden' name='form' value='$form'>\n";
            echo "<table>\n";
            echo "<tr>\n";
            echo "<td>Login:</td>\n";
            echo "<td><input type='text' name='login'></td>\n";
            echo "</tr>\n";
            echo "<tr>\n";
            echo "<td>Password:</td>\n";
            echo "<td><input type='password' name='pass'></td>\n";
            echo "</tr>\n";
            echo "<tr>\n";
            echo "<td colspan='2'><input type='submit' value='Submit'></td>\n";
            echo "</tr>\n";
            echo "</table>\n";
            echo "</form>\n";
            echo "</body>\n";
            echo "</html>\n";
        }
    }
?>
