
    <div class="w3-bar w3-green">
        <button class="w3-bar-item w3-button" onclick="openPage('regs')">Registreringar</button>
        <button class="w3-bar-item w3-button" onclick="openPage('global')">Globalt</button>
        <button class="w3-bar-item w3-button" onclick="openPage('local')">Lokalt</button>
    </div>

<div id="regs" class="w3-container settings w3-text-white">
    <h1>Registreringar</h1>
    <p>Nedan är en lista på samtliga förfrågningar om att få ett konto</p>
    <p>Godkänn ansökningarna genom att klicka i Godkänn samt andra inställningar</p>
    <hr class="custom"/>
    <?php if (isset($_SESSION["REMOVE_COMPL"])): ?>
        <span>Personerna du har lagt till kan nu logga in på sidan!</span>
        <?php unset($_SESSION["REMOVE_COMPL"]); ?>
    <?php endif; ?>
    <form method="post" action="../Settings.php">
        <table class="w3-table-all">
            <thead>
                <tr class="w3-green">
                    <th>Välj</th>
                    <th>Namn</th>
                    <th>Efternamn</th>
                    <th>Email</th>
                    <th>Galleri</th>
                    <th>Administratör</th>
                </tr>
            </thead>
            <?php foreach($this->getModel() as $key => $value): ?>
                <tr class="w3-light-green">
                <td><input type="checkbox" name="<?=$value->id?>choose"></td>
                <td><?=$value->name?></td>
                <td><?=$value->lastname?></td>
                <td><?=$value->email?></td>
                <td><input type="checkbox" name="<?=$value->id?>allowGallery"></td>
                <td><input type="checkbox" name="<?=$value->id?>isAdmin"></td>
                </tr>
            <?php endforeach;?>
        </table>
        <input type="submit" name="approve" value="Godkänn">
    </form>
</div>

<div id="global" class="w3-container settings w3-text-white" style="display: none;">
    <h1>Globala inställningar</h1>
    <p>Nedan finner du inställningar som påverkar sidan</p>
    <p>så som olika färg teman mm mm.</p>
    <hr class="custom"/>
</div>

<div id="local" class="w3-container settings" style="display: none;">
    <h1>Lokala inställningar</h1>
</div>

<script type="text/javascript">

    function openPage(pageName) 
    {
        var i;
        var x = document.getElementsByClassName("settings");
        for (i = 0; i < x.length; i++) 
        {
            x[i].style.display = "none";
        }
        document.getElementById(pageName).style.display = "block";
    }
</script>