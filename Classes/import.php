<?php

function import($file){
    $csvArray = array_map('str_getcsv', file(IMPORT_FOLDER.$file));
    $count = count($csvArray);
    $d = 0;
    $lastid = 0;
    for ($a = 1; $a < $count; $a++) {
        $csvArray[$a][8] = $d;
        $csvArrays = array_slice($csvArray[$a], 0, 9);
        $say = PROFILE->Siyahi("", "", 1, " where dna_profile.sample_name = '" . $csvArray[$a][0] . "'");
        $profils = SAMPLE_LISTS->Siyahi("", "", "", " where sample_list.sample_no = '" . $csvArray[$a][0] . "'");
        if ($say < 1) {
            $dnainsert["sample_name"] = $csvArray[$a][0];
            $dnainsert["sample_uid"] = $csvArray[$a][1];
            $dnainsert["run_name"] = $csvArray[$a][2];
            $dnainsert["panel"] = $csvArray[$a][3];
            $dnainsert["date"] = $vaxt;
            $dnainsert["sample_id"] = $profils[0]["id"];
            $dnainsert["object_id"] = $profils[0]["object_id"];
            $dnainsert["job_id"] = $profils[0]["job_id"];
            $dnainsert["person_id"] = $profils[0]["person_id"];
            $db->insert("dna_profile",$dnainsert);
            $lastid = $db->id();
            $geninsert["dna_profile_id"] = $lastid;
            $geninsert["gen_field_name"] = $csvArray[$a][4];
            if($csvArray[$a][6] == "Y"){
                $geninsert["value"] = 1;
            }else{
                $geninsert["value"] = 0;
            }
            //$geninsert["value"] = $csvArray[$a][6];
            $db->insert("gen_field",$geninsert);
            $geninsert2["dna_profile_id"] = $lastid;
            $geninsert2["gen_field_name"] = $csvArray[$a][4];
            //$geninsert2["value"] = $csvArray[$a][7];
            if($csvArray[$a][7] == "Y"){
                $geninsert2["value"] = 1;
            }else{
                $geninsert2["value"] = 0;
            }
            $db->insert("gen_field",$geninsert2);
        } else {
            $sorgu = "
                SELECT
                    *, 
                    gen_field.gen_field_name, 
                    gen_field.`value`, 
                    dna_profile.id, 
                    dna_profile.sample_name
                FROM
                    gen_field
                INNER JOIN dna_profile ON gen_field.dna_profile_id = dna_profile.id
                WHERE
                (dna_profile.sample_name = '" . $csvArray[$a][0] . "' AND gen_field.gen_field_name = '" . $csvArray[$a][4] . "' AND gen_field.value = '" . $csvArray[$a][6] . "') 
                OR (dna_profile.sample_name = '" . $csvArray[$a][0] . "' AND gen_field.gen_field_name = '" . $csvArray[$a][4] . "' AND gen_field.value = '" . $csvArray[$a][7] . "')
                ";
            $says = $db->sorgu($sorgu)->massiv_siyahi();
            if (count($says) < 1) {
                $geninsert["dna_profile_id"] = $lastid;
                $geninsert["gen_field_name"] = $csvArray[$a][4];
                if($csvArray[$a][6] == "Y"){
                    $geninsert["value"] = 1;
                }else{
                    $geninsert["value"] = 0;
                }
                //$geninsert["value"] = $csvArray[$a][6];
                $db->insert("gen_field", $geninsert);
                $geninsert2["dna_profile_id"] = $lastid;
                $geninsert2["gen_field_name"] = $csvArray[$a][4];
                //$geninsert2["value"] = $csvArray[$a][7];
                if($csvArray[$a][7] == "Y"){
                    $geninsert2["value"] = 1;
                }else{
                    $geninsert2["value"] = 0;
                }
                $db->insert("gen_field", $geninsert2);
            } else {
                echo "Bu profil bazada var";
            }
            $fileinsert["name"] = $file;
            $fileinsert["size"] = olcu(filesize(IMPORT_FOLDER.$size));
            $db->insert("file", $fileinsert);
            echo "success";
        }
    }
}
?>