<script>
    $(document).ready(function(){
        $('#cantry').change(function(){ 
            var query = $(this).val();
            if(query != '')
            {
                var _token = $('input[name="_token"]').val();
                $.ajax(
                {
                    url:'{{ route('autocomplete.discount') }}',
                    method:'POST',
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#promotion').fadeIn();
                        $('#promotion').html('<p style="color:red">' + data + ' đ' + '</p>');
                    }
                });
            }
        });
        $(document).on('click', 'li', function(){  
            $('#cantry').val($(this).text());  
            $('#promotion').fadeOut();  
        });
    });
</script>
