<?php

$table = get_field( 'series_spec_table_content' );

if ( ! empty ( $table ) ) {

    echo '<section class="seriesSpec-specTable">';

        if(get_field('series_spec_table_name')){
            echo "<h3>" . get_field('series_spec_table_name') . "</h3>";
        }

        echo '<div class="seriesSpec-specTable-table">'
                . '<table border="0">';

                    if ( ! empty( $table['caption'] ) ) {

                        echo '<caption>' . $table['caption'] . '</caption>';
                    }

                    if ( ! empty( $table['header'] ) ) {

                        echo '<thead>';

                            echo '<tr>';

                                foreach ( $table['header'] as $th ) {

                                    echo '<th>';
                                        echo $th['c'];
                                    echo '</th>';
                                }

                            echo '</tr>';

                        echo '</thead>';
                    }

                    echo '<tbody>';

                        foreach ( $table['body'] as $tr ) {

                            echo '<tr>';

                                foreach ( $tr as $td ) {

                                    echo '<td>';
                                        echo $td['c'];
                                    echo '</td>';
                                }

                            echo '</tr>';
                        }

                    echo '</tbody>';

            echo '</table>'
        . '</div>'
    . '</section>';
}