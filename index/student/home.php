    <!-- include header -->
    <?php
        include '../includes/header.php';     
    ?>
    <?php
        if(isset($_GET['user']) && isset($_SESSION['plan']) && isset($_SESSION['user']))
        {
            $get_username = $_GET['user'];
            if(!empty($get_username) && $get_username == $_SESSION['user'])
            {
                // set groupe first login && set group if groupe history is not exists
                set_groupe_history($_SESSION['user']);
                $row = select_index_query('*','etudient','pseudo_etu',$get_username);
    ?>
        <div class="wrapper">
      
            <div class="main-panel">
            
            <!-- include top navigation -->
            <?php include '../includes/top_nav.php'; ?>
                
            <!-- include sidebar --> 
            <?php include '../includes/sidebar.php'; ?>

            <!-- content -->
            <div class="content container-fluid" style="display:flex">
               <!-- posts -->
                <div id="posts-container" style="width:100%">
                    <div class="overlay"></div>
                        <!-- post -->
                        <?php
                            $grp_id = get_grpId_byStud($row['pseudo_etu']);
                            $rq = "SELECT * FROM post WHERE groupe_id = $grp_id order by id desc";
                            $res = mysqli_query($con,$rq);
                            $imp = "";
                            while($row2 = mysqli_fetch_assoc($res)){
                                if($row2['type_post'] == 'important')
                                    $imp = "<i class='far fa-calendar-alt' style='float:inline-end;padding-right:15px;font-size:140%'></i>";
                                echo '<div class="row post-row" id="" style="margin-top: 2%">
                        <section style="width:85%;">
                            <div class="text">'.$imp.'<div class="date" style="margin-left: 65px;color:#2f88de">'.$row2['date_post'].'</div>
                                <img src="assets/images/'.$row['image_etu'].'" />
                                <textarea id="post-content" style="border:none;color:#999;font-size:120%" disabled>'.$row2['contenu'].'</textarea>
                                <input type="submit" id="republish-post" value="Republish" />
                            </div>
                        </section>
                    </div>';
                            }
                        ?>         
                </div>
                <!-- aside -->
                <div id="aside-container" style="width:29%">
                    <div class="aside row">               

                    </div>
                </div>
            </div>
            <script>
                $("#nrm-post").click(function() {
                    $(".date-imp-post").css("display", "inline-table");
                    $(".date-imp-post").show("slide");
                });

                $("#imp-post").click(function() {
                    $(".date-imp-post").css("display", "none");
                    $(".date-imp-post").hide("slide");
                });
                
                $(document).on("click","#publish-post",(function(){
                    alert();
                    var post_content = $("#post-content").val();
                    var type_post = $("#type-post option:selected").val();
                    var date_imp = null;
                    if(type_post == "important"){
                        date_imp = new Date($("#dateImp").val());
                    }
                    $.ajax({
                        url: "includes/add_post.php",
                        type: "post",
                        data: {post_content: post_content, type_post: type_post, date_imp: date_imp},
                        beforeSend: function(){
                 
                            $(".looding").prepend("<img src='../assets/icons/Dual%20Ring-1.6s-200px.svg' class='image-responsive' alt='Looding...' style='width:8%'/>");
                        },
                        success: function(){
                 
                            $("#posts-container").load(location.href+" #posts-container");
                        }
                    });
                }));
            </script>

    <!-- include footer -->
    <?php include '../includes/footer.php'; ?>
                
    <?php 
            }
            else
                header ('location: home.php?user='.$_SESSION['user']);
        }
                
    ?>
