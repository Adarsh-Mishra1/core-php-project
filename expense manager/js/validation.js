    //validation
    $().ready(function(){
        //login form validation
        
        $("#login_form").validate({
            rules:{
                username:{
                    required:true,
                    email:true           
                },
                password:{
                    required:true
                }
            },
            messages:{
                username:{
                    required:"* Required",
                    email:" Invalid email"
                    // minlength:"Minimum 3 characters"
                },
                password:{
                    required:"* Required",
                    // minlength:"Minimum 3 characers"
                }
            }    
        });
        
        $("#add_income_form").validate({
            rules:{
                income_amount:{
                    required:true,
                    number:true,
                },
                income_type:{
                    required:true
                },
                income_date:{
                    required:true
                }
            },
            messages:{
                income_amount:{
                    required:"* Required",
                    number:"Only Numeric Values allowed"
                    // minlength:"Minimum 3 characters"
                },
                income_type:{
                    required:"* Required",
                    // minlength:"Minimum 3 characers"
                },
                income_date:{
                    required:"* Required",
                    // minlength:"Minimum 3 characers"
                }
            }    
        });

        $("#add_expense_form").validate({
            rules:{
                expense_price:{
                    required:true,
                    number:true,
                },
                expense_category:{
                    required:true
                },
                expense_date:{
                    required:true
                },
                payment_mode:{
                    required:true
                }
            },
            messages:{
                expense_amount:{
                    required:"* Required",
                    number:"Only Numeric Values allowed"
                    // minlength:"Minimum 3 characters"
                },
                expense_category:{
                    required:"* Required",
                    // minlength:"Minimum 3 characers"
                },
                expense_date:{
                    required:"* Required",
                    // minlength:"Minimum 3 characers"
                },
                payment_mode:{
                    required:"* Required",
                    // minlength:"Minimum 3 characers"
                }
            }    
        });
        
        $("#update_expense").validate({
            rules:{
                expense_price:{
                    required:true,
                    number:true,
                },
                expense_category:{
                    required:true
                },
                expense_date:{
                    required:true
                },
                payment_mode:{
                    required:true
                }
            },
            messages:{
                expense_amount:{
                    required:"* Required",
                    number:"Only Numeric Values allowed"
                    // minlength:"Minimum 3 characters"
                },
                expense_category:{
                    required:"* Required",
                    // minlength:"Minimum 3 characers"
                },
                expense_date:{
                    required:"* Required",
                    // minlength:"Minimum 3 characers"
                },
                payment_mode:{
                    required:"* Required",
                    // minlength:"Minimum 3 characers"
                }
            }    
        });

        $("#register").validate({
            rules:{
                f_name:{
                    required:true,
                    minlength:2,
                    maxlength:20
                },
                l_name:{
                    required:true,
                    minlength:2,
                    maxlength:20,
                },
                email:{
                    required:true,
                    email:true
                },
                password:{
                  required:true  
                },
                mob1:{
                    required:true,
                    number:true,
                    minlength:10,
                    maxlength:10
                },
                mob2:{
                    required:true,
                    number:true,
                    minlength:10,
                    maxlength:10

                }
                

            },
            messages:{
                f_name:{
                    required:"* Requird",
                    minlength:"Minimum 3 character allowed",
                    maxlength:"Maximum 20 character allowed"
                },
                l_name:{
                    required:"* Required",
                    minlength:"Minimum 3 character allowed",
                    maxlength:"Maximum 20 character allowed"
                },
                email:{
                    required:"* Required",
                    email:true
                },
                password:{
                    required:"* Required",
                },
                mob1:{
                    required:"* Required",
                    number:"Numerics allowd only",
                    minlength:"Minimum 10 character allowed",
                    maxlength:"Maximum 10 character allowed"
                },
                mob2:{
                    required:"* Required",
                    number:"Numerics allowd only",
                    minlength:"Minimum 10 character allowed",
                    maxlength:"Maximum 10 character allowed"

                }  
            }
        });

    });
