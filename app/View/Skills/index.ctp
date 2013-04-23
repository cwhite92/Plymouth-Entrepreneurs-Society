    <div class="entry">
        <div class="content skills">
            <div class="meta">
                <h1>Skills by name</h1>
                <?php
                    $temp   = '';
                    $i      = 0;
                    foreach($skills as $skill):
                        if ( $i == 0 ) {
                            $temp = strtoupper($skill['Skill']['name'][0]);
                            echo '<ol class="clearfix"><li><h1>'.$temp.'</h1></li>';
                        }

                        if ( $temp != strtoupper($skill['Skill']['name'][0]) ) {
                            echo '</ol>';
                        }

                        if ( $temp != strtoupper($skill['Skill']['name'][0]) ) {
                            $temp = strtoupper($skill['Skill']['name'][0]);
                            echo '<ol class="clearfix"><li><h1>'.$temp.'</h1></li>';
                        }

                        echo '<li>'.$this->Html->Link(htmlspecialchars($skill['Skill']['name']), array('action' => 'view', $skill['Skill']['name'])).'</li>';
                        $i++;
                        if ( $i == count($skills) ) {
                            echo '</ol>';
                        }
                    endforeach;
                ?>
            </div><!-- END .meta -->
        </div><!-- END .content -->
    </div><!-- END .entry -->