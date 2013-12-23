<div>{{@Session::get("clicked")}}</div>

<?php
foreach ($clicks as $click) {
    echo $click . "<br />";
}