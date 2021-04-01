<script>

$('#deleteAdmin').click(async function deleteAdmins(a) {
        let retVal = confirm('Do you wish to continue?');
        if(retVal === true){
            $(this).text('Loading.....').attr({'disabled':true});
            let selected = $(".smallCheckBox");
            let dataArray = [];
            for(let i = 0; i < selected.length; i++){
                if($(selected[i]).is(':checked')){

                    dataArray.push($(selected[i]).val());
                }
            }

            if(dataArray.length == 0){
                $(this).text('Delete Admin(s)').attr({'disabled':false});
                showSuccessToaster('Please select at least one Admin(s) to continue', 'warning');
                return;
            }

            let postData = await postRequest(baseUrl+'api/deleteUsers', {dataArray:dataArray.join('|')});
            let {error_code, success_statement, error_message} = postData;
            if(error_code == 0){
                $(a).text('Delete Admin(s)').attr({'disabled':false});
                showSuccessToaster(success_statement, 'success');
                setTimeout(function () {
                    location.reload();
                }, 2000)
            }else{
                $(a).text('Delete Admin(s)').attr({'disabled':false});
                showSuccessToaster(error_message, 'warning');
            }
        }

    })


</script>