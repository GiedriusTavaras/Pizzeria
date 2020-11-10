{{-- <label>DEscription</label><textarea name="v_description[]"cols="30" rows="10"></textarea><br><br>
<label>Photo</label><input type="file" name="v_photo[]"><br><br>
<label>Price</label><input type="text" name="v_price[]"><br><br>
<label>Discount</label><input type="text" name="v_discount_price[]"><br><br>
<input type="hidden" name="v[]" value="1">
<label>Size</label><select name="v_size_id[]">
@foreach ($sizes as $size)
<option value="{{$size->id}}">{{$size->title}}</option>
@endforeach
</select><br><br> --}}


 


            <div class="mb-4 flex flex-col text-sm">
                <label for="title" class="font-bold mb-1">Description</label>
                <textarea
                class="ckeditor summernote shadow-md appearance-none w-full border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                name="v_description[]"cols="10" rows="10"></textarea>
            </div>
            <div class="flex flex-col text-sm">
                <label for="title" class="font-bold mb-2">Photo</label>
                <input class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                type="file" name="v_photo[]">
            </div>
            <div class="mb-4 flex flex-col text-sm">
                <label for="title" class="font-bold mb-1">Price</label>
                <input class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                type="text" name="v_price[]">
            </div>
            <div class="mb-4 flex flex-col text-sm">
                <label for="title" class="font-bold mb-1">Discount price</label>
                <input class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                type="text" name="v_discount_price[]">
            </div>
            <div class="shadow-md flex flex-col text-sm">
                <input type="hidden" name="v[]" value="1">
                <label class="font-bold mt-4 mt-2" >Size</label><select name="v_size_id[]">
                    @foreach ($sizes as $size)
                    <option value="{{$size->id}}">{{$size->title}}</option>
                    @endforeach
                    </select>
            </div>
            

      