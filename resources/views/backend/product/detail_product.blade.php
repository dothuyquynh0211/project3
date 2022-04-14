@extends('backend.layout.master')
@section('title','Trang chủ Admin')

@section('content')
<style>
    /* ----- Variables ----- */
$color-primary: #4c4c4c;
$color-secondary: #a6a6a6;
$color-highlight: #ff3f40;

/* ----- Global ----- */
* {
  box-sizing: border-box;
}




h3 {
  font-size: 0.7em;
  letter-spacing: 1.2px;
  color: $color-secondary;
}

img {
      max-width: 100%;
      filter: drop-shadow(1px 1px 2px $color-secondary);
    }

/* ----- Product Section ----- */
.product {
  display: grid;
  grid-template-columns: 0.9fr 1fr;
  margin: auto;
  padding: 2.5em 0;
  min-width: 600px;
  background-color: rgb(247, 241, 241);
  border-radius: 5px;
}

/* ----- Photo Section ----- */
.product__photo {
  position: relative;
  width: 300px;
}

.photo-container {
  position: absolute;
  left: -0.5em;
  display: grid;
  grid-template-rows: 1fr;
  width: 100%;
  height: 100%;
  border-radius: 6px;
  box-shadow: 4px 4px 25px -2px rgba(0, 0, 0, 0.3);
}

.photo-main {
  border-radius: 6px 6px 0 0;
  background-color: #e01010;
  background: radial-gradient(#e5f89e, #f5f7f3);

  .controls {
    display: flex;
    justify-content: space-between;
    padding: 0.8em;
    color: #fff;

    i {
      cursor: pointer;
    }
  }

  img {
    position: absolute;
    left: -3.5em;
    top: 2em;
    max-width: 110%;
    filter: saturate(150%) contrast(120%) hue-rotate(10deg)
      drop-shadow(1px 20px 10px rgba(0, 0, 0, 0.3));
  }
}

.photo-album {
  padding: 0.7em 1em;
  border-radius: 0 0 6px 6px;
  background-color: #fff;
}
  /* ul {
    display: flex;
    justify-content: space-around;
  } */

  /* li {
    float: left;
    width: 55px;
    height: 55px;
    padding: 7px;
    border: 1px solid $color-secondary;
    border-radius: 3px;
  } */
}

/* ----- Informations Section ----- */
.product__info {
  padding: 0.8em 0;
}

.title {
  h1 {
    margin-bottom: 0.1em;
    color: $color-primary;
    font-size: 1.5em;
    font-weight: 900;
  }

  span {
    font-size: 0.7em;
    color: $color-secondary;
  }
}

.price {
  margin: 1.5em 0;
  color: $color-highlight;
  font-size: 1.2em;

  span {
    padding-left: 0.15em;
    font-size: 2.9em;
  }
}

.variant {
  overflow: auto;

  h3 {
    margin-bottom: 1.1em;
  }

  li {
    float: left;
    width: 35px;
    height: 35px;
    padding: 3px;
    border: 1px solid transparent;
    border-radius: 3px;
    cursor: pointer;

    &:first-child,
    &:hover {
      border: 1px solid $color-secondary;
    }
  }

  li:not(:first-child) {
    margin-left: 0.1em;
  }
}

.description {
  clear: left;
  margin: 2em 0;

  h3 {
    margin-bottom: 1em;
  }

  ul {
    font-size: 0.8em;
    list-style: disc;
    margin-left: 1em;
  }

  li {
    text-indent: -0.6em;
    margin-bottom: 0.5em;
  }
}

.buy--btn {
  padding: 1.5em 3.1em;
  border: none;
  border-radius: 7px;
  font-size: 0.8em;
  font-weight: 700;
  letter-spacing: 1.3px;
  color: #fff;
  background-color: $color-highlight;
  box-shadow: 2px 2px 25px -7px $color-primary;
  cursor: pointer;

  &:active {
    transform: scale(0.97);
  }
}

/* ----- Footer Section ----- */
footer {
  padding: 1em;
  text-align: center;
  color: #fff;
}
  a {
    color: $color-primary;

    &:hover {
      color: $color-highlight;
    }
  }
}
    </style>
<section class="product">
    <div class="product__photo">
      <div class="photo-container">
        <div class="photo-main">
          {{-- <div class="controls">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share-fill" viewBox="0 0 16 16">
                <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z"/>
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
              </svg>
          </div> --}}
          <img src="/image/{{$product->image}}" alt="" style="max-height: 350px; max-width:350px" >
         {{-- / <img src="https://res.cloudinary.com/john-mantas/image/upload/v1537291846/codepen/delicious-apples/green-apple-with-slice.png" alt="green apple slice"> --}}
        </div>
        <div class="photo-album">
            @foreach ($image as $item)
            <img src="/gallery/{{$item->url}}" alt="" style="max-height: 100px; max-width:100px" >            
            @endforeach
          
        </div>
      </div>
    </div>
    <div class="product__info">
      <div class="title">
        <h1>{{$product->name}}</h1>
        <span>COD: {{$product->sku}}</span>
      </div>
      <div class="price">
         <span>Giá:{{number_format($product->price).' '.'VNĐ'}}</span>
      </div>
      <div class="brand">
         <span>brand : {{$product->id_brand}}</span>
      </div>
         <p>category : {{$product->id_category}}</p>
         <p>size : {{$product->id_size}}</p>
       
      </div>
      <div class="variant">
        <h3>SELECT A COLOR</h3>
      Màu:  {{$product->id_color}}
        <ul>
          
        </ul>
      </div>
      <div class="description">
        <h3>Mô tả</h3>
        <ul>
          {{-- <li>Apples are nutricious</li>
          <li>Apples may be good for weight loss</li>
          <li>Apples may be good for bone health</li>
          <li>They're linked to a lowest risk of diabetes</li> --}}
          {{$product->description}}
        </ul>
      </div>
      
    </div>
  </section>
  
  {{-- <footer>
    <p>Design from <a href="https://dribbble.com/shots/5216438-Daily-UI-012">dribbble shot</a> of <a href="https://dribbble.com/rodrigorramos">Rodrigo Ramos</a></p>
  </footer> --}}

  
  

@endsection