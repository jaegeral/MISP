<?php
App::uses('AppHelper', 'View/Helper');

// prepend user names on the header with some text based on the given rules
class UserNameHelper extends AppHelper
{
    /**
     * @param string $email
     * @return string
     */
    public function convertEmailToName($email)
    {
        $name = explode('@', $email);
        $name = explode('.', $name[0]);
        foreach ($name as $key => $value) {
            $name[$key] = ucfirst($value);
        }
        return implode(' ', $name);
    }

    public function prepend($email)
    {
        $lower_email = strtolower($email);
        if (
            (strpos($lower_email, 'saad') !== false && strpos($lower_email, 'thehive-project')) ||
            strpos($lower_email, 'saad.kadhi') !== false
        ) {
            return '<i class="fas fa-smile white"></i>&nbsp;';
        } else if (strpos($lower_email, 'enrico.lovat') !== false) {
            return '<i class="fas fa-horse-head white"></i>&nbsp;';
        } else if (strpos($lower_email, 'christophe.vandeplas') !== false) {
            return '<i class="fas fa-smile-beam white"></i>&nbsp;';
        } else if (strpos($lower_email, 'rand') !== false && (strpos($lower_email, 'ecrime') !== false)) {
            return '<i class="fas fa-camera white"></i>&nbsp;';
        } else if ($lower_email === 'sami.mokaddem@circl.lu') {
            return '<span class="bold white">Graphman</span> ';
        } else if (strpos($lower_email, 'm.j.nassette') !== false) {
            return '<i class="fas fa-cheese white"></i>&nbsp;';
        }
        return '';
    }
}
