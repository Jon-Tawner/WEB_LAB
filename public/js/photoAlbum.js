
// const PhotoAlbum = {
//   data() {
//     return {
//       index: -1,
//       photos: [
//         {
//           photo: 'public/img/15548.jpg',
//           title: 'Космос!!',
//           alt: 'Космос!!',
//         }, {
//           photo: 'public/img/D2QI41g11Kc.jpg',
//           title: 'Limbo',
//           alt: 'Очень мрачная картина!!',
//         }, {
//           photo: 'public/img/foto-ustavshij-kot.jpg',
//           title: 'Моя морда',
//           alt: 'Sad cat in a suit',
//         }, {
//           photo: 'public/img/peyzazhi-les-noch-mlechnyy-put.jpg',
//           title: 'Млечный Путь',
//           alt: 'Млечный Путь',
//         }, {
//           photo: 'public/img/PicsArt_06-18-01_11_46.jpg',
//           title: 'Картинка из снов',
//           alt: 'Что-то на грани мрачного и вдoхновляющего',
//         }
//       ]
//     };
//   }
// };

// const app = Vue.createApp(PhotoAlbum);

// app.component("album-item", {
//   props: ["package"],
//   emits: ["click"],
//   template: `
//             <div @click="$emit('click')">
//                 <div class="photo">
//                     <img class="img" :src="package.photo" :alt="package.alt">
//                 </div>
//             </div>
//       `,
//   data() {
//     return {
//       isOpened: false
//     };
//   }
// });

// app.component("img-popup", {
//   props: ["photos", "index"],
//   emits: ["close"],
//   template: `
//           <teleport to="body">
//           <div class="img_popup">
//               <button type="button" class="to_left" style="font-size: 100px" @click="previous">&#8249;</button>
//               <div class="BigPhoto" @click.self="$emit('close')">
//                   <img :src="photos[id].photo" :alt="photos.alt">
//               </div>
//               <button type="button" class="to_right" style="font-size: 100px"@click="next">&#8250;</button>
//           </div>
//       </teleport>
//       `,
//   data() {
//     return {
//       id: this.$props.index
//     };
//   },
//   methods: {
//     previous: function () {
//       this.id = !this.id ? this.$props.photos.length - 1 : this.id - 1;
//     },
//     next: function () {
//       this.id = (this.id === this.$props.photos.length - 1) ? 0 : this.id + 1;
//     }
//   }
// });

// app.mount("#app");






// let album = $('.photo');
// let count = 0;
// let buffer = []
// var current = 0

// for (const key in images) {
//   let albumRow = $('.row:last-child');
//   let image = $('.photo');

//   let img = $('<img/>');
//   let name = $('<p></p>');
//   let divPhoto = $('<div></div>');


//   divPhoto.addClass('photo');
//   img.attr('data-key', images[key]['filename']);
//   img.attr('alt', images[key]['alt']);
//   img.attr("src", '/website/public/img/' + images[key]['filename'] + '.jpg');
//   img.css({
//     width: "150px",
//     height: "150px",
//   })
//   img.click(function () {
//     BigPhotoOpen(true, img.attr("src"));
//     current = key - 1;
//   })
//   name.text(images[key]['name']);

//   if (count++ % 4 == 0) {
//     let divRow = $('<div></div>');
//     divRow.addClass('row');
//     album.append(divRow);
//   }

//   albumRow.append(divPhoto);
//   buffer.push(img)
//   image.eq(image.length - 1).append(name);
//   image.eq(image.length - 1).append(img);
// }

let buffer = [];
$('.photo').each(function () {
  let img = $(this).children("img");
  buffer.push(img)
  $(this).on('click', function () {
    BigPhotoOpen(true, img.attr("src"));
    current = img.attr("id") - 1;
  })
});

let backGround_BigPhoto = $("#BackGround-BigPhoto");
let bigPhoto = $("#BigPhoto");

backGround_BigPhoto.on('click', function () {
  BigPhotoOpen(false);
})

function BigPhotoOpen(setActiv, src = null) {
  if (setActiv) {
    backGround_BigPhoto.css("display", 'flex');
    bigPhoto.attr("src", src);
    bigPhoto.css("display", 'flex');
  }
  else {
    backGround_BigPhoto.css("display", 'none');
    bigPhoto.css("display", 'none');
  }
}

$(document).keydown(function (e) {
  if (e.keyCode == 37) {
    prev();
  }
  else if (e.keyCode == 39) {
    next();
  }
})

function next() {
  current++;
  if (current >= buffer.length) {
    current = 0
  }

  BigPhotoOpen(true, buffer[current].attr("src"))
}

function prev() {
  current--;
  if (current < 0) {
    current = buffer.length - 1
  }

  BigPhotoOpen(true, buffer[current].attr("src"))
}