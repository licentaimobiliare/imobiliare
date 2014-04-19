 <form method="POST" action="<?php echo APP_URL ?>game/addComment/<?php echo $params[0]; ?>">
        <h4>Please type your comment here</h4>
     <?php if($_SESSION['error'] && $_SESSION['error']=="yes"){
         ?>
         <p class="wrong">Be careful answering the anti-spam question. Also, empty comments are not accepted!</p>
         <?php
     $_SESSION['error'] = "no";
     } ?>
        <p class="comment_area" id="comments">
            <input type="button" id="bold" value="B" class="button_x">
            <input type="button" id="italic" value="I" class="button_x">
            <input type="button" id="underline" value="U" class="button_x">

            <select id="color">
                <option value="black">black</option>
                <option value="white">white</option>
                <option value="red">red</option>
                <option value="yellow">yellow</option>
                <option value="blue">blue</option>
            </select>
            <textarea name="comment_text" cols="60" rows="3"></textarea>
        </p>
        <p class="comment_area">

            <?php
                $a = mt_rand(1, 5);
                $b = mt_rand(1, 4);
                $c = $a + $b;
            ?>

            <label>Be kind answer this anti-spam question, thank you.<br/><?php echo $a . " + " . $b . "= "; ?></label>
            <input class="text_box_x" type="text" name="user_answer"/><br/>
            <input type="hidden" name="answer" value="<?php echo $c; ?>"/>

        <input class="button_x" type="submit" value="Post comment" name="post_comment"/>
        </p>
 </form>
