<?php
class jQMeter extends plxPlugin {

 
    public function __construct($default_lang){

    # Appel du constructeur de la classe plxPlugin (obligatoire)
    parent::__construct($default_lang);


    # Pour accéder à une page d'administration
    $this->setAdminProfil(PROFIL_ADMIN,PROFIL_MANAGER);
    
    # Pour accéder à une page de configuration
    $this->setConfigProfil(PROFIL_ADMIN,PROFIL_MANAGER);

    # Déclaration des hooks
    $this->addHook('jQMeter', 'jQMeter'); //hook pour l'affichage manuel

    $this->addHook('ThemeEndBody', 'ThemeEndBody');

    } 

    
    public function jQMeter() {?>
      <div id="graph"></div>
      <p><?php echo $this->getParam('info');?></p>
      <p><?php echo $this->getParam('valeur');?></p>
      <?php 
    }

    public function ThemeEndBody(){ ?>

        <script type="text/javascript">
            /* <![CDATA[ */
               if(typeof(jQuery) === "undefined") document.write(\'<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"><\/script>\');
            /* !]]> */
            </script>


        <script src="<?php echo PLX_PLUGINS ?>jQMeter/js/jqmeter.min.js"></script>

        <script>
            $('#graph').jQMeter({

                goal:"<?php echo $this->getParam('objectif');?>",
                raised:"<?php echo $this->getParam('actuel');?>",


                // the width of the progress meter
                width: "<?php echo $this->getParam('largeur');?>",

                // the height of the progress meter
                height: "<?php echo $this->getParam('hauteur');?>",

                // the background color
                // Supports hex, rgba, or word values
                bgColor: "<?php echo $this->getParam('bgColor');?>",

                // the text color
                // supports hex, rgba, or word values.
                barColor: "<?php echo $this->getParam('barColor');?>",

                // horizontal or vertical
                orientation: "horizontal",

                // counter speed in milliseconds
                counterSpeed: 2000,

                // animation time in milliseconds.
                animationSpeed: 2000,

                // whether to display the percentage completed or raised.
                displayTotal: true

                });
        </script>

        <?php
    }
      
} // class graphevo
?>