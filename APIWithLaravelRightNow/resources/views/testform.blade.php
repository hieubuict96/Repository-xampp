<form action="test" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="number" name="id">
    <input type="text" name="Ten">
    <input type="text" name="TenKhongDau">
    <input type="submit">
</form>