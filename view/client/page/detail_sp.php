<!-- chi tiết sản phẩm  -->
<div class="mx-20">
        <div class="grid grid-cols-2 gap-5">
          <div class="grid grid-rows-[80%20%]">
            <!-- chỗ dữ liệu ảnh từng sản phẩm khi ấn xem chi tiết sản phẩm -->
            <div class="relative border-solid border-[1px] border-gray-300 p-5 overflow-hidden">
              <img
                src="../view/assets/img/bong-1.webp"
                alt="Ảnh sản phẩm"
                class="w-100% transition-transform duration-500 transform"
                id="product-image"
              />
            </div>

            <!-- các ảnh bổ sung của sản phẩm  -->
            <!-- <div class="flex justify-between mt-3">
              <div class="">
                <img
                  class="border-solid border-[1px] border-gray-300"
                  src="./img/áo_Mu_đỏ.png"
                  alt=""
                />
              </div>
              <div class="">
                <img
                  class="border-solid border-[1px] border-gray-300"
                  src="./img/áo_Mu_đỏ.png"
                  alt=""
                />
              </div>
              <div class="">
                <img
                  class="border-solid border-[1px] border-gray-300"
                  src="./img/áo_Mu_đỏ.png"
                  alt=""
                />
              </div>
              <div class="">
                <img
                  class="border-solid border-[1px] border-gray-300"
                  src="./img/áo_Mu_đỏ.png"
                  alt=""
                />
              </div>
            </div> -->
            <!-- các ảnh bổ sung của sản phẩm  -->
          </div>

          <!-- phần tên , giá , mô tả, kichs cỡ , chọn size và add đặt hàng  -->
          <div class="">
            <div class="product_description">
              <h4 class="font-semibold text-3xl">
                <a href="#">ÁO MU</a>
              </h4>
              <div class="product_price my-3">
                <span class="text-[#FF324D] font-semibold text-2xl"
                  >$45.00</span
                >
                <del class="text-gray-500 font-mono mx-2">$55.25</del>
               <span class="text-[#388E3C] font-mono">35% Off</span>
                <span class="ml-20"
                  ><i class="fa-solid fa-star" style="color: #f5db38"></i>
                  <i class="fa-solid fa-star" style="color: #f5db38"></i>
                  <i class="fa-solid fa-star" style="color: #f5db38"></i>
                  <i class="fa-regular fa-star" style="color: #f5db38"></i>
                </span> 
                <span class="rating_num">(21)</span> XẾP HANG 
              </div>

              <div class="my-2">
                <p class="text-[#687188] font-normal">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Phasellus blandit massa enim. Nullam id varius nunc id varius
                  nunc.
                </p>
              </div>
              <div class="">
                <ul>
                  <li class="font-semibold">
                    <i
                      class="fa-solid fa-user-shield"
                      style="color: #eb0017"
                    ></i>
                    1 Year AL Jazeera Brand Warranty
                  </li>
                  <li class="font-semibold">
                    <i class="fa-brands fa-instalod" style="color: #eb0017"></i>
                    30 Day Return Policy
                  </li>
                  <li class="font-semibold">
                    <i
                      class="fa-solid fa-sack-dollar"
                      style="color: #eb0017"
                    ></i>
                    Cash on Delivery available
                  </li>
                </ul>
              </div>

              <!--LUA CHON COLOR -->
              <div class="my-4">
                <form action="" method="get">
                  <span class="font-semibold text-gray-700 text-xl mr-2"
                    >Color
                  </span>
                  <span
                    ><input id="radio-1" name="radio" type="radio" checked />
                    <label for="radio-1" class="radio-label"
                      ><i
                        class="fa-solid fa-shirt"
                        style="color: black"
                      ></i></label
                  ></span>
                  <span
                    ><input id="radio-1" name="radio" type="radio" checked />
                    <label for="radio-1" class="radio-label"
                      ><i
                        class="fa-solid fa-shirt"
                        style="color: #ea1026"
                      ></i></label
                  ></span>
                  <span
                    ><input id="radio-1" name="radio" type="radio" checked />
                    <label for="radio-1" class="radio-label"
                      ><i
                        class="fa-solid fa-shirt"
                        style="color: blueviolet"
                      ></i></label
                  ></span>
                </form>
              </div>
              <!-- LUA CHON SIZE -->
              <form action="" method="get">
                <span class="font-semibold text-gray-700 text-xl mr-5"
                  >Size
                </span>
                <span
                  ><input id="radio-1" name="radio" type="radio" checked />
                  <label for="radio-1" class="radio-label"
                    ><i class="fa-solid fa-s" style="color: #6f7680"></i></label
                ></span>
                <span class="mx-3"
                  ><input id="radio-1" name="radio" type="radio" checked />
                  <label for="radio-1" class="radio-label"
                    ><i class="fa-solid fa-m" style="color: #4c4c10"></i></label
                ></span>
                <span
                  ><input id="radio-1" name="radio" type="radio" checked />
                  <label for="radio-1" class="radio-label"
                    ><i class="fa-solid fa-l" style="color: black"></i></label
                ></span>
              </form>
            </div>

            <br />
            <hr />

            <!--THEM SO LUONG -->
            <div class="my-5">
              <button
                class="bg-gray-100 rounded-[50%] w-8 p-1 font-black text-l"
                onclick="decrement()"
              >
                <i class="fa-solid fa-caret-down" style="color: #f8303a"></i>
              </button>
              <span
                class="border-solid border-[1px] border-gray-300 rounded-sm px-5 p-2"
                id="number-display"
                >1</span
              >
              <button
                class="bg-gray-100 rounded-[50%] w-8 p-1 font-black text-l"
                onclick="increment()"
              >
                <i class="fa-solid fa-caret-up" style="color: #f8303a"></i>
              </button>

              <!-- Add to cart       -->

              <input
                class="bg-[#ff324d] px-10 py-3 ml-2 duration-[0.25s] rounded-md text-white hover:bg-white hover:text-[#ff324d] border-solid border-[#ff324d] border-[1px]"
                type="submit"
                value="Add to cart"
              />

              <span
                ><i class="fa-solid fa-recycle mx-2" style="color: gray"></i
              ></span>
              <span
                ><i class="fa-solid fa-heart mx-2" style="color: #f8303a"></i
              ></span>
            </div>

            <hr />

            <ul class="my-4">
              <li>SKU: <a href="#">BE45VGRT</a></li>
              <li>Category: <a href="#">Clothing</a></li>
              <li>
                Tags: <a href="#" rel="tag">Cloth</a>,
                <a href="#" rel="tag">printed</a>
              </li>
            </ul>

            <span
              ><i class="fa-brands fa-facebook-f" style="color: #85888e"></i>
              <i class="ml-[16px] fa-brands fa-youtube" style="color: #85888e"></i>
              <i
                class="ml-[16px] fa-solid fa-location-dot"
                style="color: #85888e"
              ></i>
              <i class="ml-[16px] fa-brands fa-google" style="color: #85888e"></i>
            </span>
          </div>
        </div>
        <!-- binh luan  -->
        <div class="my-6">
          <h1 class="mt-20 text-[#f8303a] font-semibold">Comment:</h1>
          <div
            class="border-gray-400 rounded-md border-[1px] h-28 border-solid"
          ></div>
        </div>

        <!-- San pham cung danh muc -->
        <h1 class="font-semibold text-3xl">Sản Phẩm Liên Quan</h1>
        <div class="grid grid-cols-4 gap-6">
          <div class="border-[1px] border-solid border-gray-200 rounded-sm p-4 ">
            <img class="" src="./img/áo_Mu_đỏ.png" alt="" />
            <h4 class="font-semibold text-lg mt-4 duration-[0.25s] hover:text-red-500">
              <a href="#">Áo MU</a>
            </h4>
            <div class="product_price my-3">
              <span class="text-[#FF324D] font-semibold text-lg">$45.00</span>
              <del class="text-gray-500 font-mono mx-2">$55.25</del>
              <span class="text-[#388E3C] font-mono">35% Off</span>
              <br />
              <i class="fa-solid fa-star" style="color: #f5db38"></i>
              <i class="fa-solid fa-star" style="color: #f5db38"></i>
              <i class="fa-solid fa-star" style="color: #f5db38"></i>
              <i class="fa-regular fa-star" style="color: #f5db38"></i>
              <!-- <span class="rating_num">(21)</span> XEEPS HANG -->
            </div>
          </div>
          <div class="border-[1px] border-solid border-gray-200 rounded-sm p-4">
            <img class="" src="./img/áo_Mu_đỏ.png" alt="" />
            <h4 class="font-semibold text-lg mt-4 duration-[0.25s] hover:text-red-500">
              <a href="#">Áo MU</a>
            </h4>
            <div class="product_price my-3">
              <span class="text-[#FF324D] font-semibold text-lg">$45.00</span>
              <del class="text-gray-500 font-mono mx-2">$55.25</del>
              <span class="text-[#388E3C] font-mono">35% Off</span>
              <br />
              <i class="fa-solid fa-star" style="color: #f5db38"></i>
              <i class="fa-solid fa-star" style="color: #f5db38"></i>
              <i class="fa-solid fa-star" style="color: #f5db38"></i>
              <i class="fa-regular fa-star" style="color: #f5db38"></i>
              <!-- <span class="rating_num">(21)</span> XEEPS HANG -->
            </div>
          </div>

          <div class="border-[1px] border-solid border-gray-200 rounded-sm p-4">
            <img class="" src="./img/áo_Mu_đỏ.png" alt="" />
            <h4 class="font-semibold text-lg mt-4 duration-[0.25s] hover:text-red-500">
              <a href="#">Áo MU</a>
            </h4>
            <div class="product_price my-3">
              <span class="text-[#FF324D] font-semibold text-lg">$45.00</span>
              <del class="text-gray-500 font-mono mx-2">$55.25</del>
              <span class="text-[#388E3C] font-mono">35% Off</span>
              <br />
              <i class="fa-solid fa-star" style="color: #f5db38"></i>
              <i class="fa-solid fa-star" style="color: #f5db38"></i>
              <i class="fa-solid fa-star" style="color: #f5db38"></i>
              <i class="fa-regular fa-star" style="color: #f5db38"></i>
              <!-- <span class="rating_num">(21)</span> XEEPS HANG -->
            </div>
          </div>

          <div class="border-[1px] border-solid border-gray-200 rounded-sm p-4">
            <img class="" src="./img/áo_Mu_đỏ.png" alt="" />
            <h4 class="font-semibold text-lg mt-4 duration-[0.25s] hover:text-red-500">
              <a href="#">Áo MU</a>
            </h4>
            <div class="product_price my-3">
              <span class="text-[#FF324D] font-semibold text-lg">$45.00</span>
              <del class="text-gray-500 font-mono mx-2">$55.25</del>
              <span class="text-[#388E3C] font-mono">35% Off</span>
              <br />
              <i class="fa-solid fa-star" style="color: #f5db38"></i>
              <i class="fa-solid fa-star" style="color: #f5db38"></i>
              <i class="fa-solid fa-star" style="color: #f5db38"></i>
              <i class="fa-regular fa-star" style="color: #f5db38"></i>
              <!-- <span class="rating_num">(21)</span> XEEPS HANG -->
            </div>
          </div>
        </div>
      </div>