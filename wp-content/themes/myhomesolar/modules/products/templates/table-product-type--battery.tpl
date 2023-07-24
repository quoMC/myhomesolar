<?php

echo "<div class=\"seriesSpec-specTable-table\">"
        . "<table>"
            . "<tr>"
                . "<th>Model</th>"
                . "<th>Description</th>"
                . "<th>Expandable Storage Capacity</th>"
                . "<th>High Performance</th>"
                . "<th>Back-Up Protection</th>"
                . "<th>Modular Design</th>"
                . "<th>Remote Monitoring</th>"
                . "<th>Power Categories</th>"
            . "</tr>"
            . "<tr>";

            $seriesSpecTableRows = get_field('series_spec_table_row_battery');

            $modelArray=[];
            $powerOutputArray=[];
            $maxEfficiencyArray=[];
            $weightArray=[];
            $cellTechnologyArray=[];
            $dimensionsArray=[];

            foreach ($seriesSpecTableRows as $seriesSpecTableRow){

                $modelArray[] = $seriesSpecTableRow['model'];
                $descriptionArray[] = $seriesSpecTableRow['description'];
                $expStorageCapacityArray[] = $seriesSpecTableRow['expandable_storage_capacity'];
                $highPerformanceArray[] = $seriesSpecTableRow['high_performance'];
                $backupProtectionArray[] = $seriesSpecTableRow['back_up_protection'];
                $modularDesignArray[] = $seriesSpecTableRow['modular_design'];
                $remoteMonitorArray[] = $seriesSpecTableRow['remote_monitoring'];
                $powerCatArray[] = $seriesSpecTableRow['power_categories'];

                echo "<tr>"
                        . "<td>" . $seriesSpecTableRow['model'] . "</td>"
                        . "<td>" . $seriesSpecTableRow['description'] . "</td>"
                        . "<td>" . $seriesSpecTableRow['expandable_storage_capacity'] . "</td>"
                        . "<td>" . $seriesSpecTableRow['high_performance'] . "</td>"
                        . "<td>" . $seriesSpecTableRow['back_up_protection'] . "</td>"
                        . "<td>" . $seriesSpecTableRow['modular_design'] . "</td>"
                        . "<td>" . $seriesSpecTableRow['remote_monitoring'] . "</td>"
                        . "<td>" . $seriesSpecTableRow['power_categories'] . "</td>"
                    . "</tr>";

            }

    echo "</table>"
. "</div>"
. "<script type=\"application/ld+json\">"
    . "{"
        . "\"@context\" : [\"https://schema.org\", {\"csvw\": \"http://www.w3.org/ns/csvw#\"}],"
        . "\"@type\" : \"Dataset\","
        . "\"name\" : \"" . get_field('series_spec_table_title') . "\","
        . "\"description\" : \"Power, weight, technology and dimensions of " . $postTitle . "\","
        . "\"publisher\" : {"
            . "\"@type\" : \"Organization\","
            . "\"name\" : \"My Home Solar Ltd.\""
        . "},"
        . "\"license\" : \"https://creativecommons.org/licenses/by-nc-sa/4.0\","
        . "\"creator\" :{"
            . "\"@type\" : \"Organization\","
            . "\"url\" : \"https://myhomesolar.uk\","
            . "\"name\" : \"My Home Solar Ltd.\","
            . "\"contactPoint\":{"
                . "\"@type\" : \"ContactPoint\","
                . "\"contactType\" : \"Customer Service\","
                . "\"telephone\" : \"+448001933933\","
                . "\"email\" : \"quotes@myhomesolar.uk\""
            . "}"
        . "},"
        . "\"mainEntity\" : {"
            . "\"@type\" : \"csvw:Table\","
            . "\"csvw:tableSchema\" : {"
                . "\"csvw:columns\" : ["
                    . "{"
                        . "\"csvw:name\" : \"Model\","
                        . "\"csvw:datatype\" : \"string\","
                        . "\"csvw:cells\" : [";

                            foreach($modelArray as $model){
                                echo "{"
                                    . "\"csvw:value\" : \"" . $model . "\","
                                    . "\"csvw:primaryKey\": \"" . $model . "\"";
                                if( $model === end( $modelArray ) ) {
                                    echo "}";
                                } else {
                                    echo "},";
                                }
                            }

                        echo "]"
                    . "},"
                    . "{"
                        . "\"csvw:name\" : \"Description\","
                        . "\"csvw:datatype\" : \"string\","
                        . "\"csvw:cells\" : [";

                            foreach($descriptionArray as $descriptionId => $description){
                                echo "{"
                                    . "\"csvw:value\" : \"" . $description . "\","
                                    . "\"csvw:primaryKey\": \"" . $modelArray[$descriptionId] . "\"";
                                if( $description === end( $descriptionArray ) ) {
                                    echo "}";
                                } else {
                                    echo "},";
                                }
                            }

                        echo "]"
                    . "},"
                    . "{"
                        . "\"csvw:name\" : \"Expandable Storage Capacity\","
                        . "\"csvw:datatype\" : \"string\","
                        . "\"csvw:cells\" : [";

                            foreach($expStorageCapacityArray as $expStorageCapacityId => $expStorageCapacity){
                                echo "{"
                                    . "\"csvw:value\" : \"" . $expStorageCapacity . "\","
                                    . "\"csvw:primaryKey\": \"" . $modelArray[$expStorageCapacityId] . "\"";
                                if( $expStorageCapacity === end( $expStorageCapacityArray ) ) {
                                    echo "}";
                                } else {
                                    echo "},";
                                }
                            }

                        echo "]"
                    . "},"
                    . "{"
                        . "\"csvw:name\" : \"High Performance\","
                        . "\"csvw:datatype\" : \"string\","
                        . "\"csvw:cells\" : [";

                            foreach($highPerformanceArray as $highPerformanceId => $highPerformance){
                                echo "{"
                                    . "\"csvw:value\" : \"" . $highPerformance . "\","
                                    . "\"csvw:primaryKey\": \"" . $modelArray[$highPerformanceId] . "\"";
                                if( $highPerformance === end( $highPerformanceArray ) ) {
                                    echo "}";
                                } else {
                                    echo "},";
                                }
                            }

                        echo "]"
                    . "},"
                    . "{"
                        . "\"csvw:name\" : \"Back-Up Protection\","
                        . "\"csvw:datatype\" : \"string\","
                        . "\"csvw:cells\" : [";

                            foreach($backupProtectionArray as $backupProtectionId => $backupProtection){
                                echo "{"
                                    . "\"csvw:value\" : \"" . $backupProtection . "\","
                                    . "\"csvw:primaryKey\": \"" . $modelArray[$backupProtectionId] . "\"";
                                if( $backupProtection === end( $backupProtectionArray ) ) {
                                    echo "}";
                                } else {
                                    echo "},";
                                }
                            }

                        echo "]"
                    . "},"
                    . "{"
                        . "\"csvw:name\" : \"Modular Design\","
                        . "\"csvw:datatype\" : \"string\","
                        . "\"csvw:cells\" : [";

                            foreach($modularDesignArray as $modularDesignId => $modularDesign){
                                echo "{"
                                    . "\"csvw:value\" : \"" . $modularDesign . "\","
                                    . "\"csvw:primaryKey\": \"" . $modelArray[$modularDesignId] . "\"";
                                if( $modularDesign === end( $modularDesignArray ) ) {
                                    echo "}";
                                } else {
                                    echo "},";
                                }
                            }

                        echo "]"
                    . "},"
                    . "{"
                        . "\"csvw:name\" : \"Remote Monitoring\","
                        . "\"csvw:datatype\" : \"string\","
                        . "\"csvw:cells\" : [";

                            foreach($remoteMonitorArray as $remoteMonitorId => $remoteMonitor){
                                echo "{"
                                    . "\"csvw:value\" : \"" . $remoteMonitor . "\","
                                    . "\"csvw:primaryKey\": \"" . $modelArray[$remoteMonitorId] . "\"";
                                if( $remoteMonitor === end( $remoteMonitorArray ) ) {
                                    echo "}";
                                } else {
                                    echo "},";
                                }
                            }

                        echo "]"
                    . "},"
                    . "{"
                        . "\"csvw:name\" : \"Power Categories\","
                        . "\"csvw:datatype\" : \"string\","
                        . "\"csvw:cells\" : [";

                            foreach($powerCatArray as $powerCatId => $powerCat){
                                echo "{"
                                    . "\"csvw:value\" : \"" . $powerCat . "\","
                                    . "\"csvw:primaryKey\": \"" . $modelArray[$powerCatId] . "\"";
                                if( $powerCat === end( $powerCatArray ) ) {
                                    echo "}";
                                } else {
                                    echo "},";
                                }
                            }

                        echo "]"
                    . "}"
                . "]"
            . "}"
        . "}"
    . "}"
. "</script>";