
    $(document).keydown(function(event){
        if (event.which == 27) {  
            event.preventDefault();
            window.location.href = "logout.php";
        }


        var activo_menu = $(".activo_menu").length;
          if (event.which == 225) {
            event.preventDefault()
            if (activo_menu == 0) {
                $("#jaja").html("Control de menu: Activado")
                $("#jaja").addClass("activo_menu")
                $("#jaja").removeClass("label-default")
                $("#jaja").addClass("label-success")
            }
            if (activo_menu == 1) {
                $("#jaja").html("Control de menu: Desactivado")
                $("#jaja").removeClass("activo_menu")
                $("#jaja").removeClass("label-success")
                $("#jaja").addClass("label-default")
                
                $(".li_teclado .list_nav").slideUp()
                $(".li_teclado a").css("background-color","") 
                $(".li_teclado .list_nav").removeClass("sub_menu")
                $(".li_sub_menu").removeClass("li_sub_menu")
                $(".li_teclado").removeClass("li_teclado")

            }
          }

          if (activo_menu == 1) {
              var li_teclado    = $(".li_teclado").length;
              var sub_menu      = $(".sub_menu").length;
              var li_sub_menu   = $(".li_sub_menu").length;
                if (event.which==40) {  
                    
                    if (sub_menu == 0) {    
                        if (li_teclado == 0) {
                            $(".menu_pr li:first .title_a").css("background-color","rgba(255,255,255,0.2)")  
                            $(".menu_pr li:first").addClass("li_teclado");  
                        }
                        if (li_teclado == 1) {
                            var li_nextt = $(".li_teclado").next()
                            $(".li_teclado a").css("background-color","")
                            $(".li_teclado").removeClass("li_teclado")  
                            li_nextt.addClass("li_teclado")
                            li_nextt.children("a").css("background-color","rgba(255,255,255,0.2)")  
                        }
                    }
                    if (sub_menu == 1) {
                        if (li_sub_menu == 0) {
                            $(".li_teclado .list_nav li:first a").css("background-color","rgba(255,255,255,0.2)")  
                            $(".li_teclado .list_nav li:first").addClass("li_sub_menu")
                        }
                        if (li_sub_menu == 1) {
                            var li_sub_nextt = $(".li_sub_menu").next()
                            $(".li_sub_menu a").css("background-color","")
                            $(".li_sub_menu").removeClass("li_sub_menu")  
                            li_sub_nextt.addClass("li_sub_menu")
                            li_sub_nextt.children("a").css("background-color","rgba(255,255,255,0.2)")  
                        }
                    }    
                
                }
                if (event.which == 38) {
                    if (sub_menu == 0) {
                        if (li_teclado == 0) {
                            $(".menu_pr li:last .title_a").css("background-color","rgba(255,255,255,0.2)")  
                            $(".menu_pr li:last").addClass("li_teclado");  
                        }
                        if (li_teclado == 1) {
                            var li_prevv = $(".li_teclado").prev()
                            $(".li_teclado a").css("background-color","")
                            $(".li_teclado").removeClass("li_teclado")  
                            li_prevv.addClass("li_teclado")
                            li_prevv.children("a").css("background-color","rgba(255,255,255,0.2)")  
                        }
                    }
                    if (sub_menu ==1) {
                        if (li_sub_menu == 0) {
                            $(".li_teclado .list_nav li:last a").css("background-color","rgba(255,255,255,0.2)")  
                            $(".li_teclado .list_nav li:last").addClass("li_sub_menu")
                        }
                        if (li_sub_menu == 1) {
                            var li_sub_prevv = $(".li_sub_menu").prev()
                            $(".li_sub_menu a").css("background-color","")
                            $(".li_sub_menu").removeClass("li_sub_menu")  
                            li_sub_prevv.addClass("li_sub_menu")
                            li_sub_prevv.children("a").css("background-color","rgba(255,255,255,0.2)")  
                        }
                    }
                }
                if (event.which == 39 && li_teclado == 1) {
                    $(".li_teclado .list_nav").slideDown()
                    $(".li_teclado .list_nav").addClass("sub_menu")
                }
                if (event.which == 37 && li_teclado == 1) {
                    $(".li_teclado .list_nav").slideUp()
                    $(".li_teclado .list_nav").removeClass("sub_menu")
                    $(".li_sub_menu").removeClass("li_sub_menu")
                }
                if (li_teclado == 1 && li_sub_menu == 0) {
                    if (event.which == 13) {
                        var url_li = $(".li_teclado .title_a").attr("data")
                        window.location.href = url_li;

                    }
                }
                if (li_teclado == 1 && li_sub_menu == 1) {
                    if (event.which == 13) {
                        var url_li = $(".li_sub_menu a").attr("href")
                        window.location.href = url_li;
                    }
                }
                
          }
    });   

    $(document).ready(function(){
       
       $(this).on("keydown",function(e){
          e.cancelBubble = true;
          console.log(e.keyCode);
          if(e.ctrlKey && e.keyCode==80){
             e.preventDefault();
             window.location.href = "cliente.php?pr=listado";
          }
          if(e.ctrlKey && e.keyCode==73){
             e.preventDefault();
             window.location.href = "cliente.php?inm=listado";
          }
          if(e.ctrlKey && e.keyCode==617){
             e.preventDefault();
             window.location.href = "cliente.php?ck=listado";
          }
          if(e.ctrlKey && e.keyCode==83){
             e.preventDefault();
             window.location.href = "cliente.php?cos=listado";
          }
          if(e.ctrlKey && e.keyCode==82){
             e.preventDefault();
             window.location.href = "cliente.php?rep=listado";
          }
          if(e.ctrlKey && e.keyCode==77){
             e.preventDefault();
             window.location.href = "menu_inicial.php";
          }
          if(e.ctrlKey && e.keyCode==71){
             e.preventDefault();
             window.location.href = "cliente.php";
          }
          /**if(e.shiftKey && e.keyCode==80){
             e.preventDefault();
             window.location.href = "asasf.php";
          }**/
          
       });
    });

    $(document).ready(function() {
        $(".li_nav").click(function(event){
            var control_slc  = $(".slc").length
            if (control_slc == 0) {
                $(this).find('.list_nav').slideDown();
                $(this).find('.list_nav').addClass("slc")
                $(this).find('.title_a').css({"background-color": "rgba(255,255,255,0.2)", "color": "#fff"})
            }
            if (control_slc == 1) {
                var control_slcN = $(".slc").prev().html()
                var control_comp = $(this).find('a').html()

                if (control_slcN == control_comp) {
                    $(this).find('.list_nav').slideUp(); 
                    $(this).find('.slc').prev().css({"background-color": "", "color": "#fff"})
                    $(this).find('.list_nav').removeClass("slc") 
                }
                else{
                    $('.slc').slideUp(200); 
                    $('.slc').prev().css({"background-color": "", "color": "#fff"})
                    $('.slc').removeClass("slc");
                    $(this).find('.list_nav').slideDown(70);
                    $(this).find('.list_nav').addClass("slc");
                    $(this).find('.title_a').css({"background-color": "rgba(255,255,255,0.2)", "color": "#fff"})
                }
 
            }
        });
    });