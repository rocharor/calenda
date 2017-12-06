function validar()
            {
                //console.log(form.dtNascimento.value)
                dataPost = form.calendario.value
                var data = dataPost.split('/');
                var dia = dataPost[0];
                var mes = dataPost[1];
                var ano = dataPost[2];
                
                if(dia>31 || mes>12 ) 
                {
                    alert('Data invalida');
                    form.calendario.focus();    
                    form.calendario.style.background = '#ff0';
                    return;    
                }
                
                window.location = 'calculoData.php?data='+dataPost;
            }
            
            $(function(){
                $("#calendario").datepicker({
                    changeYear:true,
                    yearRange:'c-80:',
                    dateFormat:'dd/mm/yy',
                    changeMonth: true,
                    monthNamesShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"], 
                    dayNamesMin: ["Dom","Seg","Ter","Qua","Qui","Sex","Sab"], 
                    
                    showOn: 'both',    
                    buttonImageOnly: true,
                    buttonImage: 'img/icone_calendario.png'//colocar imagem do calendario    
                });
                
            })