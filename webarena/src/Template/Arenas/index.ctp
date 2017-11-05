<div class="grid-container background cell">
      <div class="grid-x align-center cell">
          <div class="small-12 text-center cell">
    <h1> RULES </h1>
          </div>
      </div>
    <div class="grid-x align-center cell">
        <div class="small-12 cell">

    <p> To start playing you must <?php echo $this->Html->link("login",["action"=>"login"]);?> or <?php echo $this->Html->link("register",["action"=>"register"]);?> if you don't have an account.
        You can then create a <?php echo $this->Html->link("fighter",["action"=>"fighter"]);?>, choose his name and change his avatar by clicking on the thumbnail.</p>
    <p> Once you've created you avatar
        you can start playing by going to the <?php echo $this->Html->link("view",["action"=>"sight"]);?>.</p>
    <p> Use the arrows to move around, if you want to attack someone, position yourself next to him,
        check the attack box and click the arrow corresponding. </p>
    <p> If you have any upgrades available go back to your fighter page, a form will appear and let you choose what upgrade you want for your
        fighter.
    </p>
    <p> If you want to send a message to another fighter go to the <?php echo $this->Html->link("messages",["action"=>"messages"]);?> page, choose your fighter and you'll have an historic of your conversations
        and the possibility to send a new message. </p>
    <p> The <?php echo $this->Html->link("diary",["action"=>"diary"]);?> page shows all the events that happened in the last 24 hours. </p>
    </div>
    </div>
</div>