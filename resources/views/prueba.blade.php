<x-app-layout>
<div class="container">
    {{--
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4  lg:grid-cols-4 xl:grid-cols-8  2xl:grid-cols-12 gap-2">
            <div class="bg-blue-100 sm:col-span-2 ">A</div>
            <div class="bg-blue-200">B</div>
            <div class="bg-blue-300">C</div>
            <div class="bg-blue-400">D</div>
            <div class="bg-blue-500">E</div>
            <div class="bg-blue-600">F</div>
            <div class="bg-blue-700">G</div>
            <div class="bg-blue-800">H</div>
            <div class="bg-blue-900">I</div>
            <div class="bg-green-100">A</div>
            <div class="bg-green-200">B</div>
            <div class="bg-green-300">C</div>
            <div class="bg-green-400">D</div>
            <div class="bg-green-500">E</div>
            <div class="bg-green-600">F</div>
            <div class="bg-green-700">G</div>
            <div class="bg-green-800">H</div>
            <div class="bg-green-900">I</div>
        </div>

        <div class="grid grid-cols-4 gap-4">
            <div class="bg-green-100 col-span-2 col-start-2">A</div>
            <div class="bg-green-200 col-start-4">B</div>
            <div class="bg-green-300">C</div>
            <div class="bg-green-400">D</div>
            <div class="bg-green-500">E</div>
        </div>

        <div class="grid grid-cols-4 grid-rows-2 gap-4">
            <div class="bg-red-100">A</div>
            <div class="bg-red-200">B</div>
            <div class="bg-red-300 col-span-2 row-span-2">C</div>
            <div class="bg-red-400">D</div>
            <div class="bg-red-500">E</div>
        </div>

        <div class="container">
            <div class="grid grid-flow-col grid-rows-3 grid-cols-4">
                <div class="bg-yellow-100">1</div>
                <div class="bg-yellow-200">2</div>
                <div class="bg-yellow-300">3</div>
                <div class="bg-yellow-400">4</div>
                <div class="bg-yellow-500">5</div>
                <div class="bg-yellow-600">6</div>
                <div class="bg-yellow-700">7</div>
                <div class="bg-yellow-800">8</div>
                <div class="bg-yellow-900">9</div>
            </div>
        </div>

        <div class="container">
            <h1 class="font-sans text-6xl md:text-3xl font-bold	">Este es un elemento de prueba</h1>
            <p class="font-serif italic leading-loose">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto accusantium dicta amet quam illum, itaque cum molestiae eaque animi. Officiis maxime enim, exercitationem autem nihil perspiciatis! Vero accusamus libero vel.</p>
            <ul>
                <li class="font-mono text-sm">Elemento 01</li>
                <li class="font-mono text-sm">Elemento 02</li>
                <li class="font-mono text-sm">Elemento 03</li>
            </ul>
        </div>

    <style>
        .imagen {
            background-image: url("{{asset('img/backgroundhome.jpg')}}");
            height: 500px;
            width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <div class="cotaniner">
        <h1 class="text-center text-3x1 font-bold mb-3">Background</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio, amet rem. Eligendi labore laudantium quia, magnam nostrum sed? Illo accusantium dolor eum dicta corporis nihil deleniti fugit, cupiditate expedita nobis.</p>
        x
        <div class="border border-black imagen bg-fixed"></div>
        x
        <div class="border border-black imagen"></div>
        x
        <div class="border border-black imagen bg-contain bg-no-repeat"></div>
        x
        <div class="border border-black imagen bg-cover bg-center"></div>
        x
    </div>

    <div class="container mx-auto pt-5">
        <div class="w-64 h-64 bg-gray-300 border-l-8 border-t-8 border-blue-800 hover:border-opacity-25"></div>

    <div class="container mx-auto pt-5">
        <div class="w-64 h-32 bg-gray-300 border-8 border-blue-800 border-dashed rounded-full"></div>
    </div>
    <div class="divide-y-8 divide-gray-600 divide-dotted">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis quibusdam quisquam totam earum, a molestiae quo optio magni amet ullam sequi nemo repudiandae, consequuntur est ducimus et velit? Possimus, deleniti!</p>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis quibusdam quisquam totam earum, a molestiae quo optio magni amet ullam sequi nemo repudiandae, consequuntur est ducimus et velit? Possimus, deleniti!</p>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis quibusdam quisquam totam earum, a molestiae quo optio magni amet ullam sequi nemo repudiandae, consequuntur est ducimus et velit? Possimus, deleniti!</p>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis quibusdam quisquam totam earum, a molestiae quo optio magni amet ullam sequi nemo repudiandae, consequuntur est ducimus et velit? Possimus, deleniti!</p>
    </div>

    <nav class="divide-x-8 divide-emerald-700">
        <a href="">link 1</a>
        <a href="">link 2</a>
        <a href="">link 3</a>
        <a href="">link 4</a>
        <a href="">link 5</a>
    </nav>

    <table class="table w-full border-separate lg:border-collapse table-fixed">
        <thead>
            <tr>
                <th class="w-1/8 border border-gray-400 px-4 py-2 text-gray-800">Pais</th>
                <th class="w-1/8 border border-gray-400 px-4 py-2 text-gray-800">Ciudad</th>
                <th class="w-3/4 border border-gray-400 px-4 py-2 text-gray-800">Descripcion</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-4 py-2">Peru</td>
                <td class="border border-gray-400 px-4 py-2">Lima</td>
                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae error magnam sequi qui ab placeat rerum ut doloremque repellat numquam aliquid beatae odio tempore nam, mollitia aperiam veritatis similique voluptatum. Lorem ipsum dolor sit non nobis atque modi minima, suscipit porro, ipsa dolores sunt autem velit perspiciatis a, tenetur quod.</td>
            </tr>
            <tr>
                <td class="border border-gray-400 px-4 py-2">Colombia</td>
                <td class="border border-gray-400 px-4 py-2">Bogota</td>
                <td class="border border-gray-400 px-4 py-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur recusandae facere enim dignissimos vero nulla? Similique delectus impedit itaque at eligendi, magni aut quae commodi rerum illum earum excepturi iure!Rerum illum, quasi itaque ipsa explicabo consequatur impedit sapiente labore nihil qui? Fugiat ea voluptatum rem? Nemo nam fuga, sint omnis recusandae, tempore nisi quia, assumenda earum alias dolorum amet! ut soluta non nobis atque modi minima, suscipit porro, ipsa dolores sunt autem velit perspiciatis a, tenetur quod.</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-4 py-2">España</td>
                <td class="border border-gray-400 px-4 py-2">Madrid</td>
                <td class="border border-gray-400 px-4 py-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero ipsa doloremque harum non nihil voluptas rerum, consequuntur animi quod dolores odit, temporibus totam a est atque magni velit quam. Vero. Ducimus optio maxime laudantium laborum vero provident dolore natus, quo qui recusandae repellat? Mollitia voluptate eos, quasi dolorum molestias officia iste assumenda cupiditate accusantium fugit, odit doloribus iure natus explicabo. Atque aliquid itaque facilis eligendi aut dolorem nulla neque cum, incidunt a saepe maxime perspiciatis quas quam sequi voluptatum ab accusantium illo omnis? Tempora iste totam natus voluptates excepturi quos. Veniam sunt asperiores vel quis eos cum. Quaerat sit animi esse, assumenda quidem eveniet architecto dolorem, commodi autem atque maiores accusamus illum eos omnis ab ipsum quasi aut libero rerum. In ipsam numquam ea, corrupti molestiae expedita enim quos illo commodi nesciunt similique provident? Illo voluptate, culpa, eius velit perferendis amet sunt officiis eos nostrum possimus assumenda suscipit debitis aliquam. facere ut soluta non nobis atque modi minima, suscipit porro, ipsa dolores sunt autem velit perspiciatis a, tenetur quod.</td>
            </tr>
        </tbody>
    </table>
    {{--
        incluir estas clases en un archivo aparte para optimizar
    .table th, .table td {
        @apply border border-gray-400 px-4 py-2;
    }

    .table th {
        @apply text-gray-800;
    }

    .table tbody tr:nth-child(2n+1) {
        @apply bg-gray-200;
    }
    en app.css @import (la ruta del doc creado)

    <div class="bg-blue-600 h-64">
        <div class="bg-red-600 h-full w-64">

        </div>
    </div>

<div>
    <div class="bg-gray-300 w-64 h-32 p-8 border-gray-500 box-content">
        <div class="bg-gray-600 h-full w-full">
        </div>
    </div>
    <div class="bg-gray-300 w-64 h-32 p-8 border-gray-500">
        <div class="bg-gray-600 h-full w-full">
        </div>
    </div>
</div>

<!--contervir de bock a inline..-->
<div class="container mt-4 bg-blue-500">
    <div class="bg-gray-400 text-gray-700 text-center px-4 py-4 inline-block"> 1</div>
    <div class="bg-gray-400 text-gray-700 text-center px-4 py-4 my-2 inline-block">2</div>
    <div class="bg-gray-400 text-gray-700 text-center px-4 py-4 inline-block">3</div>
</div>

<div class="container">
    <img class="float-left" src="https://images.pexels.com/photos/10757791/pexels-photo-10757791.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" >
    <img class="float-right" src="https://images.pexels.com/photos/4914899/pexels-photo-4914899.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="" >
    <p class="mb-2 clear-right">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est sit enim, voluptatum cum recusandae sequi, inventore quae vel molestiae optio, doloribus dolore aliquid distinctio in consectetur maiores autem voluptates. Eveniet.</p>
    <p class="mb-2">Iure nemo magni repellendus laboriosam optio numquam eum natus tempore vel ex officia eligendi blanditiis qui nihil expedita sit saepe quod, mollitia recusandae doloribus cupiditate totam, facere excepturi. Aspernatur, voluptatibus.</p>
    <p class="mb-2">Exercitationem nam pariatur excepturi quaerat quibusdam molestias dolorem, similique voluptatibus quia unde ipsam, voluptatem, possimus quos voluptates quam dicta voluptas delectus perspiciatis. Aperiam consectetur harum, eaque debitis quisquam id pariatur!</p>
    <p class="mb-2">Tenetur est nisi iusto commodi quibusdam nulla, cum eligendi incidunt amet nesciunt cupiditate quasi consectetur deleniti, vel aliquam dolor quisquam, laborum assumenda non! Et iure quibusdam iusto at reiciendis adipisci?</p>
    <p class="mb-2">Vitae fugiat voluptatem, id tempora error corporis numquam nesciunt quia explicabo deleniti quidem, quasi ratione voluptatibus eos architecto eveniet, mollitia nobis placeat fugit consectetur repellat ut similique odit alias! Autem?</p>
</div>
--}}
<div class="container bg-gray-300">
    <img class="w-full h-64 object-contain" src="https://cdn.pixabay.com/photo/2022/01/17/11/16/alpine-6944487_960_720.jpg" alt="">
</div>
<div class="container bg-gray-300">
    <img class="w-full h-64 object-cover" src="https://cdn.pixabay.com/photo/2022/01/17/11/16/alpine-6944487_960_720.jpg" alt="">
</div>
<div class="container bg-gray-300">
    <img class="w-full h-64 object-cover object-top" src="https://cdn.pixabay.com/photo/2022/01/17/11/16/alpine-6944487_960_720.jpg" alt="">
</div>
<div class="container bg-gray-300">
    <img class="w-full h-64 object-none" src="https://cdn.pixabay.com/photo/2022/01/17/11/16/alpine-6944487_960_720.jpg" alt="">
</div>
{{--
<div class="contauiner">
    <div class="bg-gray-300 p-4 h-64 overflow-auto">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae excepturi dicta praesentium iure. Velit, accusamus. Nisi ipsum, iusto quis, error possimus hic placeat harum libero nesciunt nemo aliquid minima! Nemo?</p>
        <p>Obcaecati unde similique placeat. Qui, illum! Nemo aspernatur, porro deserunt totam est incidunt deleniti laborum maxime possimus. Repellat aperiam perferendis impedit voluptatum repellendus neque veniam, perspiciatis molestiae, exercitationem, dolore beatae.</p>
        <p>Enim, debitis? Labore culpa nisi mollitia. Minima, culpa. Eos cupiditate eveniet sapiente sequi repellendus molestias rem ratione enim harum facere, tempore illum mollitia quaerat eaque magni eius accusantium repellat deserunt!</p>
        <p>Vel dolorum magnam ipsam optio, mollitia nemo a dolor voluptatum soluta eligendi consectetur tempora beatae ad architecto doloribus laudantium? Tenetur libero, adipisci eius voluptatem nemo itaque quasi quod magni at?</p>
        <p>Aliquam omnis neque animi, aspernatur maxime, officia sapiente accusamus perspiciatis pariatur excepturi ipsa ut minus velit obcaecati ab porro consequuntur possimus rem asperiores officiis eum alias libero! Dolores, perferendis ex?</p>
        <p>Consequuntur tempore ullam dolores ab culpa asperiores laboriosam saepe, nostrum minima repellat, voluptatem distinctio quisquam nesciunt, at cumque autem? Vero eius, vitae harum nam officia nisi provident nemo corrupti minus.</p>
        <p>Ipsa nihil vero totam, vitae mollitia corporis similique error maiores voluptatem id, amet deleniti nam hic tempore officia sequi praesentium autem veniam accusantium minima voluptate quae fugit consectetur illo. A!</p>
        <p>Laborum ut nesciunt sit vitae mollitia fuga vero ratione, quae iusto eum fugiat, excepturi soluta aperiam doloremque eos. Quisquam voluptates et saepe culpa ex nam quod commodi impedit. Consectetur, repellendus!</p>
    </div>
</div>

<div class="container mt-4">
    <div class="bg-gray-300 p-4 relative">
        <div class="bg-gray-400 p-4">
            <div class="bg-blue-400 p-4"></div>
            <div class="bg-green-400 p-4"></div>
            <div class="bg-blue-600 p-4 absolute inset-y-0 left-0"></div>
        </div>
    </div>
</div>

<div>
    <nav class="bg-blue-300 h-16 fixed w-full z-50"> Menuuuuu</nav>
    <aside class="w-64 bg-gray-800 fixed inset-y-0 z-40"></aside>
    <div class="container pt-16">
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem eveniet eum, eligendi ad enim saepe fugiat expedita sit tempora adipisci quaerat, officia harum sunt omnis quasi provident exercitationem! Quis, rerum.</p>
        <p>Amet ad nostrum quaerat aliquam ex dolorem assumenda voluptate deserunt, magni, voluptas nam exercitationem reiciendis ea. Qui, consequatur at ullam enim, error eos rem corporis corrupti libero amet molestiae provident.</p>
        <p>Ullam aliquid tempore suscipit unde sunt quae earum, nostrum sint laudantium vel cumque facilis iusto assumenda impedit omnis error recusandae dicta qui doloribus sequi, odit natus expedita! Illo, libero porro.</p>
        <p>Voluptatum iste soluta architecto repellendus doloremque ad modi quibusdam quo, tenetur sequi quae doloribus cupiditate omnis autem accusamus suscipit impedit quos, magni qui repellat aut dolor porro saepe aliquam. Libero!</p>
        <p>Laudantium totam itaque distinctio, non eius enim doloribus fugit saepe? Assumenda facere a natus temporibus quia, odio porro vel blanditiis voluptatem, eveniet reiciendis commodi distinctio maiores, aut aliquid unde consectetur!</p>
        <p>Rem placeat maiores ad officia, dolores consequuntur. Atque voluptatibus ex delectus, optio, eligendi molestiae ipsa nesciunt distinctio, maiores esse aperiam? Id eius sint delectus omnis ipsam eum? Reprehenderit, dolorem placeat.</p>
        <p>Totam consequuntur ut mollitia quos dolore labore sit maxime expedita enim aperiam fugiat nostrum fuga tenetur, excepturi minima recusandae, distinctio suscipit hic molestias ex laborum omnis dolorem iure aut? Odit!</p>
        <p>Ipsum consequatur exercitationem dicta amet voluptatem laboriosam suscipit voluptas consectetur cum voluptatum corporis numquam a non architecto fugiat, blanditiis possimus ipsa quae vitae quisquam nostrum omnis! Sapiente maiores animi recusandae.</p>
        <p>Repudiandae necessitatibus autem laboriosam amet fugiat, quasi minima maxime porro quibusdam iure sint labore vel recusandae expedita excepturi voluptatem sunt sed dicta. Unde, repudiandae aut officiis tenetur ut modi inventore.</p>
        <p>Consequuntur qui magnam maxime voluptatem dolore dolores consequatur mollitia ratione vel molestiae. Veritatis tempora iste est! A provident, laboriosam dicta ipsum, cum officia ad ut corrupti porro reiciendis vero. Aliquid!</p>
        <p>Praesentium aliquid eligendi numquam autem, deserunt corrupti eum suscipit, soluta nesciunt enim alias. Nostrum sequi ex minus suscipit, sapiente laudantium nemo expedita error velit. Quo iste rem nam repellat exercitationem?</p>
        <p>Consectetur exercitationem quibusdam unde dolores autem voluptatum, voluptatem veritatis, rem fugiat ipsum sequi eius totam fugit sint dignissimos quae ut earum non quas neque est, provident doloribus! Incidunt, dolore iusto.</p>
        <p>Quos, unde quam dicta perferendis accusantium rem molestiae nisi. Excepturi accusamus architecto quae temporibus saepe voluptates fugiat eum, placeat aperiam debitis repudiandae voluptatum tempore repellat, qui veritatis consequatur. Fugit, libero.</p>
        <p>Accusamus, cumque. Vero dolorum nisi, est provident veniam nam a maiores, similique numquam quod, tenetur tempore odio neque fugiat unde itaque cupiditate! Molestias aliquam fuga deserunt accusamus, consequuntur vero alias!</p>
        <p>Neque quod amet ducimus sed quisquam ex enim eligendi dolore earum, ipsam adipisci dignissimos alias minima incidunt exercitationem aspernatur consequuntur commodi! Maxime iste natus deserunt, error earum quos aliquam aspernatur?</p>
        <p>Reprehenderit laudantium voluptatibus repellendus. Laboriosam reprehenderit deleniti velit iste illum sit rerum quasi. Voluptatum et, repellendus enim inventore quis quam, eveniet beatae repudiandae ratione ipsa mollitia velit rem? Incidunt, consequuntur.</p>
    </div>

    <div class="container">
        <h1 class="bg-gray-300 text-gray-700 font-bold sticky top-0">Titulo 1</h1>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam a non similique consequatur, distinctio magnam alias sit. Quod quisquam adipisci, cupiditate voluptatibus aspernatur assumenda nihil odit quis totam harum saepe.</p>
        <p>Ea aliquam ad neque veritatis natus laudantium vel dicta qui! Eligendi nobis ratione, natus debitis architecto itaque enim quas doloremque distinctio odit similique quisquam eveniet iusto dignissimos, quibusdam ab blanditiis.</p>
        <p>Nisi vel eligendi qui unde ullam nulla quas ipsam, labore quaerat tempore officia veniam! Eveniet, quisquam sapiente beatae, porro libero tenetur nemo eos nam expedita cumque sunt sequi error saepe.</p>
        <p>Repellat hic neque molestias voluptatem at quo beatae nostrum placeat, rerum, sunt, optio eos aut? Illum deserunt fugiat saepe veniam, modi reprehenderit dolore error debitis eos porro a inventore. Optio.</p>
        <p>Distinctio dolor at nisi molestiae molestias perferendis blanditiis officia dolorum quam! Ut unde, ipsa soluta ipsam commodi, fugiat atque cupiditate adipisci saepe minima aliquam et! Quo assumenda modi quidem at!</p>

        <h1 class="bg-gray-300 text-gray-700 font-bold sticky top-0">Titulo 2</h1>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam a non similique consequatur, distinctio magnam alias sit. Quod quisquam adipisci, cupiditate voluptatibus aspernatur assumenda nihil odit quis totam harum saepe.</p>
        <p>Ea aliquam ad neque veritatis natus laudantium vel dicta qui! Eligendi nobis ratione, natus debitis architecto itaque enim quas doloremque distinctio odit similique quisquam eveniet iusto dignissimos, quibusdam ab blanditiis.</p>
        <p>Nisi vel eligendi qui unde ullam nulla quas ipsam, labore quaerat tempore officia veniam! Eveniet, quisquam sapiente beatae, porro libero tenetur nemo eos nam expedita cumque sunt sequi error saepe.</p>
        <p>Repellat hic neque molestias voluptatem at quo beatae nostrum placeat, rerum, sunt, optio eos aut? Illum deserunt fugiat saepe veniam, modi reprehenderit dolore error debitis eos porro a inventore. Optio.</p>
        <p>Distinctio dolor at nisi molestiae molestias perferendis blanditiis officia dolorum quam! Ut unde, ipsa soluta ipsam commodi, fugiat atque cupiditate adipisci saepe minima aliquam et! Quo assumenda modi quidem at!</p>

        <h1 class="bg-gray-300 text-gray-700 font-bold sticky top-0">Titulo 3</h1>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam a non similique consequatur, distinctio magnam alias sit. Quod quisquam adipisci, cupiditate voluptatibus aspernatur assumenda nihil odit quis totam harum saepe.</p>
        <p>Ea aliquam ad neque veritatis natus laudantium vel dicta qui! Eligendi nobis ratione, natus debitis architecto itaque enim quas doloremque distinctio odit similique quisquam eveniet iusto dignissimos, quibusdam ab blanditiis.</p>
        <p>Nisi vel eligendi qui unde ullam nulla quas ipsam, labore quaerat tempore officia veniam! Eveniet, quisquam sapiente beatae, porro libero tenetur nemo eos nam expedita cumque sunt sequi error saepe.</p>
        <p>Repellat hic neque molestias voluptatem at quo beatae nostrum placeat, rerum, sunt, optio eos aut? Illum deserunt fugiat saepe veniam, modi reprehenderit dolore error debitis eos porro a inventore. Optio.</p>
        <p>Distinctio dolor at nisi molestiae molestias perferendis blanditiis officia dolorum quam! Ut unde, ipsa soluta ipsam commodi, fugiat atque cupiditate adipisci saepe minima aliquam et! Quo assumenda modi quidem at!</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic ad assumenda odit tempora ab dicta suscipit voluptates saepe culpa asperiores. Aspernatur numquam libero voluptate cupiditate repudiandae temporibus ad placeat illo.</p>
        <p>Minima ex accusamus culpa porro mollitia nam quo doloremque laudantium molestiae repellat beatae, necessitatibus ab obcaecati a libero ipsum quis sunt aut, facere odio in, impedit quisquam? Hic, accusantium eveniet.</p>
        <p>Aut dolore quibusdam enim sunt, sed explicabo magni cumque reprehenderit, saepe quas vero atque consectetur perferendis reiciendis repellat, numquam est debitis laudantium culpa asperiores veniam illum ab. Incidunt, quam deleniti.</p>
        <p>Eveniet ab sapiente sit ea facilis sed? Quam velit illum harum eveniet beatae eum excepturi mollitia eos esse. Suscipit nobis perspiciatis facere tempora soluta inventore eum quia repellat qui delectus.</p>
        <p>Esse sunt repudiandae illo sapiente corrupti distinctio animi doloremque provident eligendi. Dolor debitis, labore doloribus sapiente eum sit facilis ut eligendi! Deserunt culpa quos vero veniam impedit quod aperiam excepturi.</p>
        <p>Non optio architecto adipisci magnam quaerat? Recusandae aperiam nobis deleniti? Voluptates veniam consequuntur, quas neque, vitae iste in, temporibus laudantium aliquam rem fugit reprehenderit alias vero ullam dolor obcaecati? Ipsa!</p>
        <p>Illo, facere ad corrupti numquam at laboriosam omnis quia magni aspernatur consectetur iste quibusdam modi consequuntur vero nulla, sunt, vel eius provident! Ad dolorum reprehenderit deserunt, culpa laboriosam recusandae itaque?</p>
        <p>Placeat, sapiente possimus deserunt corporis maxime earum dignissimos cum totam enim magni ea voluptas qui eveniet unde libero ipsum amet vero reprehenderit doloribus optio minima, assumenda soluta hic aliquam? Illo.</p>
        <p>Molestiae quidem iste enim quo aspernatur natus fugit doloribus quas at dolores facere provident rem impedit culpa autem cupiditate possimus suscipit id deleniti dolore omnis, repellendus sequi voluptates. Ea, in?</p>
        <p>Nemo explicabo nesciunt vitae quae maxime perferendis, tenetur animi blanditiis veniam reprehenderit praesentium cupiditate recusandae quibusdam dolores doloribus inventore qui minima architecto. Iure quisquam neque dolores recusandae enim voluptate praesentium?</p>
        <p>Iusto cupiditate ex a tempore commodi harum, quae, fugit eum adipisci corporis nesciunt assumenda sint, deleniti nam impedit itaque! Itaque tempore non amet aliquam sapiente accusamus expedita quas perferendis magni.</p>
        <p>Molestiae, eius inventore debitis voluptatem dolorum in praesentium voluptate illum nisi omnis, laborum maxime beatae corrupti aliquid architecto itaque sunt temporibus tempore ipsa sed amet? Quod debitis dignissimos esse delectus!</p>
        <p>Officiis optio repellendus facere perferendis illum perspiciatis ipsam molestias quis, fugiat ratione maiores ut veniam quisquam error quibusdam aspernatur eligendi accusamus autem. Obcaecati aliquam vitae amet mollitia et fuga id!</p>
        <p>Expedita quis incidunt laboriosam facilis, magnam vero, atque ab nihil est ut laborum eveniet sunt? Culpa vero asperiores laborum possimus doloremque, minima quisquam, numquam vitae veritatis, porro nostrum deserunt iure.</p>
        <p>Obcaecati voluptas sunt excepturi omnis non veritatis tempore reprehenderit esse odio dignissimos illum culpa voluptatum exercitationem vel modi facere, nobis laboriosam fugit, cumque laborum mollitia! Aspernatur dolor molestiae rem quae.</p>
        <p>Earum sint porro dicta id libero animi harum sequi sed iure, suscipit, eos iste? Accusamus enim eum esse eaque reprehenderit quisquam inventore, laborum dolore id magni aspernatur. Impedit, consequuntur facilis!</p>
        <p>Enim esse ipsum quaerat facere dolores dolore cum ab veniam adipisci maiores neque repellat nam minima debitis ea repudiandae laboriosam, quisquam ipsa magnam, unde obcaecati vitae non repellendus. Eaque, inventore.</p>
        <p>A voluptatem quis soluta quae? Accusantium ipsam aliquam voluptas! Porro placeat ad quis hic itaque magni, alias reiciendis non sit nesciunt, voluptatibus voluptates architecto autem! Dolorum expedita officiis sunt amet!</p>
        <p>Fugit voluptatum consectetur earum laborum quisquam blanditiis, repudiandae quos, at adipisci minima illo obcaecati assumenda quidem nobis expedita natus tempore soluta quas qui eos similique minus. Quae qui aliquid eos!</p>
        <p>Dolorum rem eius veritatis maiores repellat earum aut nulla, non consequuntur numquam explicabo voluptatem eaque facilis sint distinctio atque voluptas fugit illo officiis tenetur rerum expedita laborum? Minus, cum cupiditate.</p>
        <p>Non est saepe ut quaerat neque, corporis sit, odio natus dicta hic ipsa praesentium quae eos nesciunt reprehenderit quidem ipsum quos distinctio. Cumque commodi veniam odio inventore, atque sequi animi.</p>
        <p>Cum aliquid explicabo, fugit atque laborum numquam. Obcaecati quos tempora quam dolorem? Debitis fuga quisquam hic. Quo nobis ab veniam porro corporis tempora distinctio adipisci sed vitae. At, maiores porro?</p>
        <p>Ipsa natus pariatur numquam soluta magni a illum repudiandae assumenda at dolore, sed labore nemo? Voluptas sequi beatae deserunt praesentium, odit magni, ullam ex tenetur saepe consectetur libero similique unde.</p>
        <p>Perferendis adipisci laboriosam nam nemo vero! Tempora laudantium alias, incidunt saepe ut eos praesentium. Beatae earum, aliquid neque placeat quibusdam suscipit. Fugit veniam eum maiores exercitationem magni quia consequuntur at.</p>
        <p>Tempore ratione excepturi eligendi eveniet id porro nobis fuga explicabo ipsa voluptas, blanditiis similique saepe minima pariatur nulla illum maiores harum! Hic praesentium illo labore assumenda a magnam maiores aut!</p>
        <p>Dolorem similique aliquam ullam a ducimus facilis quaerat ea soluta perspiciatis magni architecto repudiandae, velit officia quo? Ducimus ratione, impedit odit voluptas corporis veniam voluptates perspiciatis, facilis itaque adipisci magni?</p>
        <p>Itaque ad eveniet ratione esse repellendus, nesciunt praesentium beatae accusantium odit doloribus vitae ex! Voluptates doloribus architecto omnis amet alias quasi tenetur porro fuga nam tempora, perferendis reprehenderit molestias debitis.</p>
        <p>A commodi tempora doloribus nobis, eveniet impedit natus aspernatur quas expedita pariatur harum voluptatem eligendi quisquam veritatis corrupti aut, voluptates quasi vitae? Aut molestiae, fugiat dolor consequuntur hic quidem non.</p>
        <p>Blanditiis eligendi ea perferendis, eaque a qui aut laudantium sapiente corrupti adipisci vel totam laborum rerum maiores tempore labore consequuntur laboriosam, id ipsum eius amet. Earum possimus labore architecto id!</p>
        <p>Magni earum adipisci assumenda amet non temporibus fuga magnam, ratione obcaecati labore odio nostrum at facere enim nisi ullam praesentium id optio? Laboriosam voluptatibus reprehenderit incidunt labore. Obcaecati, numquam quis.</p>
</div>

<div class="bg-gray-300 flex">
    <div class="bg-gray-400 text-gray-700 px-4 py-2 m-2">1</div>
    <div class="bg-gray-400 text-gray-700 px-4 py-2 m-2">2</div>
    <div class="bg-gray-400 text-gray-700 px-4 py-2 m-2">3</div>
    <div class="bg-gray-400 text-gray-700 px-4 py-2 m-2">4</div>
</div>



--}}


</div>
</x-app-layout>