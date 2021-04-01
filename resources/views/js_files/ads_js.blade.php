<script>

    $('#comfirmAds').click(async function comfirmAds(a) {
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
                $(this).text('Confirm Ad(s)').attr({'disabled':false});
                showSuccessToaster('Please select at least one Ad(s) to continue', 'warning');
                return;
            }

            let postData = await postRequest(baseUrl+'api/comfirmAdsStatus', {dataArray:dataArray.join('|')});
            let {error_code, success_statement, error_message} = postData;
            if(error_code == 0){
                $(a).text('Confirm Ad(s)').attr({'disabled':false});
                showSuccessToaster(success_statement, 'success');
                setTimeout(function () {
                    location.reload();
                }, 2000)
            }else{
                $(a).text('Confirm Ad(s)').attr({'disabled':false});
                showSuccessToaster(error_message, 'warning');
            }
        }

    })

    $('#deleteAds').click(async function deleteAds(a) {
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
                $(this).text('Delete Ad(s)').attr({'disabled':false});
                showSuccessToaster('Please select at least one Ad(s) to continue', 'warning');
                return;
            }

            let postData = await postRequest(baseUrl+'api/deleteAdsStatus', {dataArray:dataArray.join('|')});
            let {error_code, success_statement, error_message} = postData;
            if(error_code == 0){
                $(a).text('Delete Ad(s)').attr({'disabled':false});
                showSuccessToaster(success_statement, 'success');
                setTimeout(function () {
                    location.reload();
                }, 2000)
            }else{
                $(a).text('Delete Ad(s)').attr({'disabled':false});
                showSuccessToaster(error_message, 'warning');
            }
        }

    })

    $('#comfirmCvs').click(async function comfirmCvs(a) {
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
                $(this).text('Confirm Cv(s)').attr({'disabled':false});
                showSuccessToaster('Please select at least one Cv(s) to continue', 'warning');
                return;
            }

            let postData = await postRequest(baseUrl+'api/comfirmCvsStatus', {dataArray:dataArray.join('|')});
            let {error_code, success_statement, error_message} = postData;
            if(error_code == 0){
                $(a).text('Confirm Cv(s)').attr({'disabled':false});
                showSuccessToaster(success_statement, 'success');
                setTimeout(function () {
                    location.reload();
                }, 2000)
            }else{
                $(a).text('Confirm Cv(s)').attr({'disabled':false});
                showSuccessToaster(error_message, 'warning');
            }
        }

    })
    
    $('#deleteCvs').click(async function deleteAds(a) {
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
                $(this).text('Delete Cv(s)').attr({'disabled':false});
                showSuccessToaster('Please select at least one Cv(s) to continue', 'warning');
                return;
            }

            let postData = await postRequest(baseUrl+'api/deleteCvsStatus', {dataArray:dataArray.join('|')});
            let {error_code, success_statement, error_message} = postData;
            if(error_code == 0){
                $(a).text('Delete Cv(s)').attr({'disabled':false});
                showSuccessToaster(success_statement, 'success');
                setTimeout(function () {
                    location.reload();
                }, 2000)
            }else{
                $(a).text('Delete Cv(s)').attr({'disabled':false});
                showSuccessToaster(error_message, 'warning');
            }
        }

    })

   



</script>