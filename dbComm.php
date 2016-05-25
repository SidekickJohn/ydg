
<?php
session_id


// eine beliebige PHP-Funktion
function doAnything($arg1)
{
    echo "PHP Funktionsaufruf. Argument:'" . $arg1 . "'";
}

// per Argument in 'a' entscheiden welche Funktion aufgerufen werden soll
switch ($_POST['a'])
{
    case 'callDoAnything':
        doAnything($_POST['b']);
        break;

    default:
        break;
}
?>
