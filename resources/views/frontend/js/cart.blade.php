<script type="text/javascript">
function updateCart(quantity, id)
{
    $.get(
        "{{ asset('cart/update') }}",
        { quantity:quantity, id:id },
        
        function () 
        {
            location.reload();
        }
    );
}
</script>
