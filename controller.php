<?php
foreach (glob("controllers/*.php") as $filename) {
    include $filename;
}
?>