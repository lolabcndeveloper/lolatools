<div class="headerContainer">

  <div class="header">

    <div class="logo"></div>

    <h1>
      Tools
    </h1>

    <ul class="menu">

     <li class="anchorHeader <?= $idBody== 'home' ? 'active' : ''?>">
      <a href="index.php?idBody=home" title=" ir a la home">
       BUYOUTS
      </a>
     </li>

     <li class="anchorHeader <?= $idBody== 'video' ? 'active' : ''?>">
      <a href="index.php?idBody=video" title="ir al video">
       HOLIDAYS
      </a>
     </li>
  
    </ul>
  </div><!-- header -->

    <ul class="breadcrumb <?= $idBody== 'home' ? 'hide' : ''?>"> <!--en home no se muestra - controlar el last para no poner el content en :before las >> se hacen por css-->

     <li>
      <a href="#" title="volver a Search">
       Search
      </a>
     </li>

     <li>
      <a href="#" title="volver a Results">
       Results
      </a>
     </li>

    </ul>

</div><!--headerContainer-->