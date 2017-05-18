<!DOCTYPE html>
<html>
<head>
    <title>Kontakt</title>
</head>
    
    <?php require_once 'header.php'; ?>
    
<body>

    <div class="w3-row">
        <section class="contentBlockIndex w3-content g6-padding">
            
            <h1 class="g6-color-blue">Kontakt</h1>
            <p class="ingress">Vi hører gjerne på konstruktiv kritikk- og dine forslag til forbedringer av tjenesten!</p>

            <form id="kontaktskjema" action="=mailto:kontakt@gruppe-6.no" method="POST" enctype="multipart/form-data">
                <div class="w3-row">
                    <label for="navn">Ditt navn:</label><br />
                    <input id="navn" class="input" name="navn" type="text" value="" size="30" /><br />
                </div>
                <div class="w3-row g6-top-spacing">
                    <label for="epost">Din e-postadresse:</label><br />
                    <input id="epost" class="input" name="epost" type="text" value="" size="30" /><br />
                </div>
                <div class="w3-row g6-top-spacing">
                    <label for="beskjed">Din beskjed / melding:</label><br />
                    <textarea id="beskjed" class="input" name="beskjed" rows="7" cols="30"></textarea><br />
                </div>
                <button id="send" class="g6-light-green g6-top-spacing" type="submit">Send</button>
            </form>	
        </section>
        
    </div>
    
    <?php require_once 'footer.php'; ?>

</body>
</html>