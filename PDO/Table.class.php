<?php

class TableRows extends RecursiveIteratorIterator {
    function __construct($it){
        parent::__construct($it, Self::LEAVES_ONLY);
    }

    function current(){
        return "<td>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr class='childrow'>";
    }
    
    function endChildren() {
        echo "</tr>" . "\n";
    }
} 

?>