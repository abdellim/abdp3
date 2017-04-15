  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript" src="../js/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript">
    tinyMCE.init({
      // type de mode
      mode : "exact", 
      // id ou class, des textareas
      elements : "texte", 
      // en mode avancé, cela permet de choisir les plugins
      theme : "advanced", 
      // langue
      language : "fr", 
      // liste des plugins
      plugins : "autolink,lists,pagebreak,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,contextmenu,paste,directionality,fullscreen,nonbreaking,xhtmlxtras,wordcount,advlist,autosave,visualblocks",

      // les outils à afficher
      theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,formatselect,fontselect,fontsizeselect,search,fullscreen",
      theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,replace,|,blockquote,|,undo,redo,|,link,unlink,anchor,image,help,code,preview,|,forecolor,backcolor,hr,charmap,iespell,media,advhr,rtl,cite",

      // emplacement de la toolbar
      theme_advanced_toolbar_location : "top",  
      // alignement de la toolbar
      theme_advanced_toolbar_align : "left",
      // positionnement de la barre de statut
      theme_advanced_statusbar_location : "bottom", 
      // permet de redimensionner la zone de texte
      theme_advanced_resizing : true,
      
      // chemin vers le fichier css
      content_css : " ../js/design-tiny.css,", 
      // taille disponible
      theme_advanced_font_sizes: "10px,11px,12px,13px,14px,15px,16px,17px,18px,19px,20px,21px,22px,23px,24px,25px", 
      // couleur disponible dans la palette de couleur
      theme_advanced_text_colors : "33FFFF, 007fff, ff7f00", 
      // balise html disponible
      theme_advanced_blockformats : "h1, h2,h3,h4,h5,h6",
      // class disponible
      theme_advanced_styles : "Tableau=textTab;TableauSansCadre=textTabSansCadre;", 
      // possibilité de définir les class et leurs styles directement avec le code suivant
      /*
      style_formats : [
        {title : 'Bold text', inline : 'b'},
        {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
        {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
        {title : 'Example 1', inline : 'span', classes : 'example1'},
        {title : 'Example 2', inline : 'span', classes : 'example2'},
        {title : 'Table styles'},
        {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
      ],
      */
    });
  </script>
    <link rel="icon" href="../../favicon.ico">

    <title>Administration <?php echo $titre; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Fonts -->  
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>