<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Header -->
  <meta charSet="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="My Express JS website">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">
  <!-- component -->
  <div class="flex h-screen w-screen items-center overflow-hidden px-2">
    <!-- Login -->
    <form action="kontirol.php" method="post"
      class="relative flex w-96 flex-col space-y-5 rounded-lg border bg-white px-5 py-10 shadow-xl sm:mx-auto">
      <div
        class="-z-10 absolute top-4 left-1/2 h-full w-5/6 -translate-x-1/2 rounded-lg bg-blue-600 sm:-right-10 sm:top-auto sm:left-auto sm:w-full sm:translate-x-0">
      </div>

      <div class="mx-auto mb-2 space-y-3">
        <h1 class="text-center text-3xl font-bold text-gray-700">Sign in</h1>
        <p class="text-gray-500">Sign in to access your account</p>
      </div>

      <div>
        <div class="relative mt-2 w-full">
          <input type="text" id="username" value="ceren" name="username"
            class="border-1 peer block w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-2.5 pt-4 pb-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
            placeholder=" " />
          <label for="username"
            class="origin-[0] peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:scale-100 peer-focus:top-2 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:px-2 peer-focus:text-blue-600 absolute left-1 top-2 z-10 -translate-y-4 scale-75 transform cursor-text select-none bg-white px-2 text-sm text-gray-500 duration-300">
            Email </label>
        </div>
      </div>

      <div>
        <div class="relative mt-2 w-full">
          <input type="text" id="password" value="ceren1234" name="password"
            class="border-1 peer block w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-2.5 pt-4 pb-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
            placeholder=" " />
          <label for="password"
            class="origin-[0] peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:scale-100 peer-focus:top-2 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:px-2 peer-focus:text-blue-600 absolute left-1 top-2 z-10 -translate-y-4 scale-75 transform cursor-text select-none bg-white px-2 text-sm text-gray-500 duration-300">
            Şifre</label>
        </div>
      </div>
      <div class="flex w-full items-center">
        <button class="shrink-0 inline-block w-36 rounded-lg bg-blue-600 py-3 font-bold text-white">Login</button>
      </div>

    </form>
    <!-- /Login -->
  </div>

</body>

</html>