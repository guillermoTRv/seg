<p style="margin-left:20px">##Utilizar las teclas de navegación <span class="glyphicon glyphicon-arrow-up"></span> <span class=" glyphicon glyphicon-arrow-down"></span></p>
<div class="col-md-10" id="clientes">                                
    <!--<a href="process_cliente.php?cl=0" class="link_black">
        <div class="panel-body panel_cl">
            <h4>Información en general todos los clientes</h4> 
        </div>    
    </a>-->
    <?php 
        $q_clientes =  mysqli_query($q_sec,"SELECT * FROM clientes order by id_cliente asc");
        while ($array = mysqli_fetch_array($q_clientes)) {
            $id_cliente   = $array['id_cliente'];
            $name_cliente = $array['name_cliente'];
            echo "
                 <a href='process_cliente.php?cl=$id_cliente' class='link_black'>
                     <div class='panel-body panel_cl'>
                         <h4>$name_cliente</h4>
                     </div>    
                 </a>
            ";
        }
    ?>
</div>