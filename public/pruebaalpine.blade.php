<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- <style>
        .hidden {
            display: none;
        }
    </style> --}}
</head>
<body>

<div>
    <div x-data="data()" x-init="start()">
        <button :disabled="open" @click ="isOpen()">
            Menu
        </button>
        <nav  x-show="open" @click.away="close()">
            <ul>
                <li>Item 1</li>
                <li>Item 2</li>
                <li>Item 3</li>
                <li>Item 4</li>
            </ul>
        </nav>


    <script>
        function data() {
            return {
                open:null,

                start() {
                    this.open = false;
                },

                isOpen() {
                    this.open = !this.open;
                },

                close() {
                    this.open = false;
                }
            }
        }
    </script>
    </div>
</div>

<div>
    <div x-data="{mensaje: null}">
        <input type="text" x-model="mensaje">
        <button @click="$refs.msj.innerText=mensaje">Enviar</button>
        <p x-ref="msj"></p>
    </div>
</div>

<div>
    <div x-data="data()">
        <ul>
            <template x-for="product in Object.values(products)">
                <li>
                    <span x-text="product.stock"></span> -
                    <span x-text="product.name"></span>
                    <template x-if="product.stock == 0" >
                        <span>No stock</span>
                    </template>
                </li>
            </template>
        </ul>
    </div>
    <script>
        function data() {
            return {
                products: {
                    1: {
                        id: 1,
                        name: 'pantalon',
                        stock: 5
                    },
                    2: {
                        id: 2,
                        name: 'camisa',
                        stock: 0
                    },
                    3: {
                        id: 3,
                        name: 'casaca',
                        stock: 7
                    },
                    4: {
                        id: 4,
                        name: 'zaptilla',
                        stock: 0
                    },
                }
            }
        }
    </script>
</div>

<div>
    <div x-data="{ mensaje:null }">
        <input type="text" x-model="mensaje" @keydown.ctrl.a="console.log(mensaje)">

    </div>
</div>

<div>
    <div x-data="{ open:true }" @resize.window="open = window.outerWidth > 768 ? true : false">
        <p x-show="open">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A molestias sit eius! Laborum iusto voluptates voluptate adipisci recusandae quasi alias reiciendis repellendus earum! Dolor animi enim aperiam officia repellat nostrum.</p>
    </div>
</div>

<div>
    <div x-data>
        <button @click="$refs.nombre.innerHTML='texto cambiado'">
            hazme click
        </button>
        <p x-ref="nombre">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ipsam excepturi, aut reprehenderit obcaecati nulla nam harum saepe dolore accusantium consectetur nobis odit, tempore, autem laudantium? Ad asperiores perferendis harum.</p>
    </div>
</div>

<div>
    <div x-data>
        <input type="text" @input="console.log($event.target.value)">
    </div>
</div>

<div>
    <div x-data="{mensaje:null}">
        <input type="text" x-model="mensaje" @input="$dispatch('custom-event', mensaje)">
    </div>

    <div x-data="{mensaje:null}" @custom-event.window="mensaje = $event.detail">
        <input type="text" x-model="mensaje">
    </div>
</div>


<div>
    <div x-data>
    </div>

    <div x-data>
    </div>
</div>

</body>
</html>
