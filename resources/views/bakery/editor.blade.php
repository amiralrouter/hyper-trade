@extends("bakery.layout")

@section("content")
asdasd ${ message }




<script>
    const { createApp } = Vue
  
    createApp({
      data() {
        return {
          message: 'Hello Vue!'
        }
      }
      delimiters: ['${', '}']
    }).mount('#app')
  </script>


@endsection