<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="view">
	<b><?php echo "You have already done the quiz"; ?>
	<br />
</div>
<div class="view">
	<h2><b><?php echo "Score : ", $wew ?></b></h2>
        <br>
        <table>
            <tr>
                <td>
                    <?php echo "True Answer"?>
                </td>
                <td>
                    <?php echo ":"?>
                </td>
                <td>
                    <?php echo $wuw?>
                </td>
                <td>
                    <?php echo " question(s)" ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo "Wrong Answer"?>
                </td>
                <td>
                    <?php echo ":"?>
                </td>
                <td>
                    <?php echo $waw?>
                </td>
                <td>
                    <?php echo " question(s)" ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo "No Answer"?>
                </td>
                <td>
                    <?php echo ":"?>
                </td>
                <td>
                    <?php echo $wow?>
                </td>
                <td>
                    <?php echo " question(s)" ?>
                </td>
            </tr>
        </table>
</div>