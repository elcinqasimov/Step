<?php

/*
function eynilik($id,$db,$say){
    $querya = "
    select
    dnt.GNAME,
    sum(dnt.Value1) as Value1,
    sum(dnt.Value2) as Value2
    from
    (select GEN_FIELD_NAME as GNAME, MIN(`VALUE`) as Value1, 0 as Value2 from gen_field where dna_profile_id = '".$id."' group by GEN_FIELD_NAME
    UNION
    select GEN_FIELD_NAME, 0, MAX(`VALUE`) from gen_field where dna_profile_id = '".$id."' group by GEN_FIELD_NAME) dnt GROUP BY dnt.GNAME;
    ";
    $massiv = $db->sorgu($querya)->massiv_siyahi();
    $count = count($massiv);
    $query = "select a.dna_profile_id FROM `gen_field` as a \r\n";
    $query .= "INNER JOIN dna_profile as b on b.id = a.dna_profile_id WHERE(\r\n";
    for($a=0;$a<$count;$a++){
        if($a == $count-1){
            $query .= "(GEN_FIELD_NAME = '".$massiv[$a]['GNAME']."' AND (`value` = '".$massiv[$a]['Value1']."' OR `value` = '".$massiv[$a]['Value2']."'))\r\n";

        }else{
            $query .= "(GEN_FIELD_NAME = '".$massiv[$a]['GNAME']."' AND (`value` = '".$massiv[$a]['Value1']."' OR `value` = '".$massiv[$a]['Value2']."')) OR\r\n";

        }
    }
    $query .= ") AND b.deleted != 1 ";
    $query .= "GROUP BY(dna_profile_id) having count(distinct GEN_FIELD_NAME) >= ".$say."; ";
    $massiv = $db->sorgu($query)->massiv_siyahi();
    return $massiv;

}*/
function eynilik($id,$db,$say = 16,$x1 = 0){
    //
    $query = "call eynilik(".$id.",".$say.",".$x1.")";
    echo $query;
    $massiva = $db->sorgu($query)->massiv_siyahi();
    return $massiva;
}

?>