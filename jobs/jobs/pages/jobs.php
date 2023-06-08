<?php

class jobs {
    public $pdo;
    public $table;
    public $primarykey;

    public function __construct($pdo, $table, $primarykey){
        $this->pdo = $pdo;
        $this->table = $table;
        $this->primarykey = $primarykey;

    }


}



<td><a style="float: right" href="/applicants?id=<?=$job->id?>">View applicants (<?=$applicantcount['count']?>)</a></td>