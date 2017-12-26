$(window).on("load",function() {
    $.ready.then(function () {

        $("#table1").html(function () {
            $(this).load("table.php", function () {

                $.validator.addMethod("UserName", function (value,element) {
                    return this.optional(element)  || /^[A-Z]{1}[a-z]+[ ][A-Z]{1}[a-z]+$/.test(value);
                }, "UserName is not valid: please write full name");


                $("#FORM_ID").validate({
                    rules:
                        {
                            UserName:
                                {
                                    required: true,
                                    UserName: 'UserName is not valid'
                                },
                            Email:
                                {
                                    required: true,
                                    email: true
                                }
                        },

                });
                $("#mdlform").validate({
                    rules:
                        {
                            UserName:
                                {
                                    required: true,
                                    UserName: 'UserName is not valid'
                                },
                            Email:
                                {
                                    required: true,
                                    email: true
                                }
                        },
                });

                $(".btnedit").on("click", function () {
                    let id = $(this).closest('tr');
                    let UserId = $(this).attr("id");
                    let UserName = (id.find("td:eq(0)").text());
                    let Email = (id.find("td:eq(1)").text());

                    $("#mdlid").val(UserId);
                    $("#mdlid1").val(UserName);
                    $("#mdlid2").val(Email);
                    $("#mymodal").modal();
                });

                     $(".btndelete").click( function (e) {
                    console.log("delete");
                    e.preventDefault();
                    let UserId = $(this).attr("id");

                    $.ajax({
                        type: "POST",
                        url: "delete.php",
                        data:
                            {
                                flag: 'delete',
                                table: 'user',
                                UserId: `${UserId}`
                            },
                        success: function (result) {

                            if (result == 1) {
                                let p = $(`[data-id=${UserId}]`).closest('tr');

                                p.remove();
                            }
                            else if(result == 0) {
                                alert("not available")
                            }
                        }
                    })

                });
                    $("#mdlform").submit(function (e) {
                    console.log("modal edit form");
                    if($("#mdlform").valid()) {
                        e.preventDefault();

                        let p = $('#mdlform').serializeArray();

                        $.ajax({
                            type: "POST",
                            url: "delete.php",
                            data:
                                {
                                    flag: 'update',
                                    table: 'user',
                                    array: p
                                },
                            success: function (result) {
                                if (result == 1) {
                                    $("#mymodal").modal("hide");
                                    let x = $("#mdlform #mdlid").val();
                                    let r = $(`[data-id=${x}]`).closest('tr');
                                    console.log(r);
                                    let UserName = p[1]['value'];
                                    let Email = p[2]['value'];
                                    console.log(UserName);
                                    console.log(Email);

                                    r.find("td:eq(0)").text(UserName);
                                    r.find("td:eq(1)").text(Email);
                                    // $("#mdlid2").text(Email);
                                }
                                else{
                                    alert("not editable")
                                }

                            }

                        })
                    }
                });


                $("#FORM_ID").submit(function (e) {

                    console.log("Insert");
                    if($("#FORM_ID").valid()) {
                        e.preventDefault();
                        let UserName = $("#a1").val();
                        let Email = $("#a2").val();
                        console.log(UserName, Email);
                        $.ajax({
                            type: "POST",
                            url: "delete.php",
                            data:
                                {
                                    flag: 'insert',
                                    table: 'user',
                                    UserName: `${UserName}`,
                                    Email: `${Email}`
                                },
                            success: function () {

                                 $("#table1").html(function () {
                                     $(this).load("table.php", function() {
                                         console.log($('.btndelete'));

                                         $(".btndelete").click( function (e) {
                                             console.log("delete");
                                             e.preventDefault();
                                             let UserId = $(this).attr("id");

                                             $.ajax({
                                                 type: "POST",
                                                 url: "delete.php",
                                                 data:
                                                     {
                                                         flag: 'delete',
                                                         table: 'user',
                                                         UserId: `${UserId}`
                                                     },
                                                 success: function (result) {

                                                     if (result == 1) {
                                                         let p = $(`[data-id=${UserId}]`).closest('tr');

                                                         p.remove();
                                                     }
                                                     else if(result == 0) {
                                                         alert("not available")
                                                     }
                                                 }
                                             })

                                         });
                                         $(".btnedit").on("click", function () {
                                             let id = $(this).closest('tr');
                                             let UserId = $(this).attr("id");
                                             let UserName = (id.find("td:eq(0)").text());
                                             let Email = (id.find("td:eq(1)").text());

                                             $("#mdlid").val(UserId);
                                             $("#mdlid1").val(UserName);
                                             $("#mdlid2").val(Email);
                                             $("#mymodal").modal();
                                         });
                                         $("#mdlform").submit(function (e) {
                                             console.log("modal edit form");
                                             if($("#mdlform").valid()) {
                                                 e.preventDefault();

                                                 let p = $('#mdlform').serializeArray();

                                                 $.ajax({
                                                     type: "POST",
                                                     url: "delete.php",
                                                     data:
                                                         {
                                                             flag: 'update',
                                                             table: 'user',
                                                             array: p
                                                         },
                                                     success: function (result) {
                                                         if (result == 1) {
                                                             $("#mymodal").modal("hide");
                                                             let x = $("#mdlform #mdlid").val();
                                                             let r = $(`[data-id=${x}]`).closest('tr');
                                                             console.log(r);
                                                             let UserName = p[1]['value'];
                                                             let Email = p[2]['value'];
                                                             console.log(UserName);
                                                             console.log(Email);

                                                             r.find("td:eq(0)").text(UserName);
                                                             r.find("td:eq(1)").text(Email);
                                                             // $("#mdlid2").text(Email);
                                                         }
                                                         else{
                                                             alert("not editable")
                                                         }

                                                     }

                                                 })
                                             }
                                         });
                                     })
                                })

                            }

                        })

                    }
                });
            });
        });
    });
});

