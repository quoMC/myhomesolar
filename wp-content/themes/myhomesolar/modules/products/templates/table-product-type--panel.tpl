<?php

echo "<div class=\"seriesSpec-specTable-table\">"
        . "<table>"
            . "<tr>"
                . "<th>Model</th>"
                . "<th>Power Output</th>"
                . "<th>Maximum Efficiency</th>"
                . "<th>Weight</th>"
                . "<th>Solar Cell Technology</th>"
                . "<th>Dimensions</th>"
            . "</tr>"
            . "<tr>";

            $seriesSpecTableRows = get_field('series_spec_table_row');

            $modelArray=[];
            $powerOutputArray=[];
            $maxEfficiencyArray=[];
            $weightArray=[];
            $cellTechnologyArray=[];
            $dimensionsArray=[];

            foreach ($seriesSpecTableRows as $seriesSpecTableRow){

                $seriesModel = $seriesSpecTableRow['model'];
                $seriesPowerOutput = $seriesSpecTableRow['power_output'] ? $seriesSpecTableRow['power_output'] : '-';
                $seriesMaxEfficiency = $seriesSpecTableRow['maximum_efficiency'] ? $seriesSpecTableRow['maximum_efficiency'] : '-';
                $seriesWeight = $seriesSpecTableRow['weight'] ? $seriesSpecTableRow['weight'] : '-';
                $seriesCellTech = $seriesSpecTableRow['solar_cell_technology'] ? $seriesSpecTableRow['solar_cell_technology'] : '-';
                $seriesDimensions = $seriesSpecTableRow['dimensions'] ? $seriesSpecTableRow['dimensions'] : '-';

                $modelArray[] = $seriesModel;
                $powerOutputArray[] = $seriesPowerOutput;
                $maxEfficiencyArray[] = $seriesMaxEfficiency;
                $weightArray[] = $seriesWeight;
                $cellTechnologyArray[] = $seriesCellTech;
                $dimensionsArray[] = $seriesDimensions;

                echo "<tr>"
                        . "<td>" . $seriesModel . "</td>"
                        . "<td>" . $seriesPowerOutput . "</td>"
                        . "<td>" . $seriesMaxEfficiency . "</td>"
                        . "<td>" . $seriesWeight . "</td>"
                        . "<td>" . $seriesCellTech . "</td>"
                        . "<td>" . $seriesDimensions . "</td>"
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
                        . "\"csvw:name\" : \"Power Output\","
                        . "\"csvw:datatype\" : \"string\","
                        . "\"csvw:cells\" : [";

                            foreach($powerOutputArray as $powerOuputId => $powerOuput){
                                echo "{"
                                    . "\"csvw:value\" : \"" . $powerOuput . "\","
                                    . "\"csvw:primaryKey\": \"" . $modelArray[$powerOuputId] . "\"";
                                if( $powerOuput === end( $powerOutputArray ) ) {
                                    echo "}";
                                } else {
                                    echo "},";
                                }
                            }

                        echo "]"
                    . "},"
                    . "{"
                        . "\"csvw:name\" : \"Maximum Efficiency\","
                        . "\"csvw:datatype\" : \"string\","
                        . "\"csvw:cells\" : [";

                            foreach($maxEfficiencyArray as $maxEfficiencyId => $maxEfficiency){
                                echo "{"
                                    . "\"csvw:value\" : \"" . $maxEfficiency . "\","
                                    . "\"csvw:primaryKey\": \"" . $modelArray[$maxEfficiencyId] . "\"";
                                if( $maxEfficiency === end( $maxEfficiencyArray ) ) {
                                    echo "}";
                                } else {
                                    echo "},";
                                }
                            }

                        echo "]"
                    . "},"
                    . "{"
                        . "\"csvw:name\" : \"Weight\","
                        . "\"csvw:datatype\" : \"string\","
                        . "\"csvw:cells\" : [";

                            foreach($weightArray as $weightId => $weight){
                                echo "{"
                                    . "\"csvw:value\" : \"" . $weight . "\","
                                    . "\"csvw:primaryKey\": \"" . $modelArray[$weightId] . "\"";
                                if( $weight === end( $weightArray ) ) {
                                    echo "}";
                                } else {
                                    echo "},";
                                }
                            }

                        echo "]"
                    . "},"
                    . "{"
                        . "\"csvw:name\" : \"Cell Technology\","
                        . "\"csvw:datatype\" : \"string\","
                        . "\"csvw:cells\" : [";

                            foreach($cellTechnologyArray as $cellTechnologyId => $cellTechnology){
                                echo "{"
                                    . "\"csvw:value\" : \"" . $cellTechnology . "\","
                                    . "\"csvw:primaryKey\": \"" . $modelArray[$cellTechnologyId] . "\"";
                                if( $cellTechnology === end( $cellTechnologyArray ) ) {
                                    echo "}";
                                } else {
                                    echo "},";
                                }
                            }

                        echo "]"
                    . "},"
                    . "{"
                        . "\"csvw:name\" : \"Cell Technology\","
                        . "\"csvw:datatype\" : \"string\","
                        . "\"csvw:cells\" : [";

                            foreach($dimensionsArray as $dimensionsId => $dimensions){
                                echo "{"
                                    . "\"csvw:value\" : \"" . $dimensions . "\","
                                    . "\"csvw:primaryKey\": \"" . $modelArray[$dimensionsId] . "\"";
                                if( $dimensions === end( $dimensionsArray ) ) {
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

?>