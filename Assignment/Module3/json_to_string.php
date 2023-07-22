<?php
    function jsnToString($value,$key)
    {
        echo "$key: $value"."<br>";
    }

    $json_data ='{"name": "John",
        "book name":"php",
        "details":
        {
            "publisher":"litle brown"
        }
    }';
    $array_data = json_decode($json_data, true);
    array_walk_recursive($array_data, "jsnToString");
?>