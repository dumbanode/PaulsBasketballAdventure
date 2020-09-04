<!-- 
formMenu.php 
Cameron Smith
March 29 2018

When you decide to take the exam at V-IOU University, this is the form that will be produced.
Currently there is only one form, so the questions have been hard coded in.
If I were to continue this, I would make this form similar to other menus where you can
dynamically load content from an external JSON file
-->
<div class="formMenu">
    <div id="formSub" class="collapse"> 
        <div class="textbox"> 
            <div class="toScroll">
                <form action="#" onsubmit="grabExamDetails();return false;" id="exam">
                    <h3 id="formStart"><strong>V-IOU ENTRANCE EXAM</strong></h3>
                    <p><strong>What's your favorite color?</strong></p>
                    <input type="radio" name="color" value="red"> red
                    <input type="radio" name="color" value="blue"> blue
                    <input type="radio" name="color" value="magenta"> magenta
                    <input type="radio" name="color" value="paradiddle"> paradiddle
                    <p><strong>Which is correct?</strong></p>
                    <p><strong>2+2=4 or 3+2=6</strong></p>
                    <input type="radio" name="math" value="yes"> Yes
                    <input type="radio" name="math" value="no"> No
                    <p><strong>A baby cat is called</strong></p>
                    <input type="radio" name="cat" value="true"> True
                    <input type="radio" name="cat" value="false"> False
                    <p><strong>How can I email my grandson?</strong></p>
                    <textarea rows="4" cols="50"></textarea><br>
                    <input type="submit" value="Submit Exam">
                </form>
            </div>
        </div> 
    </div>
</div>

