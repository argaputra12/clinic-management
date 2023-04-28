<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
  <div class="fixed inset-0 transition-opacity" aria-hidden="true">
    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
  </div>
  <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
  <div id="edit-pengguna-modal"
    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
      <div class="sm:flex sm:items-start justify-between">
        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
          <h3 class="text-lg leading-6 font-semibold text-gray-900 mb-6" id="modal-headline">
            Edit Data Pengguna
          </h3>
          <div class="mt-2">
            <form action="{{ route('user.update', [$user->id]) }}" method="PUT">
              @csrf
              <div class="mb-4">
                <label for="nik" class="block text-gray-700 text-sm font-bold mb-2">NIK</label>
                <input type="text" name="nik" id="nik" placeholder={{ $user->nik }}
                  value={{ $user->nik }}
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              </div>
              <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="text" name="email" id="email" placeholder={{ $user->email }}
                  value={{ $user->email }}
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              </div>
              <div class="flex justify-end">
                <button type="submit"
                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <i class="close-edit-pengguna-modal fa-solid fa-xmark fa-lg cursor-pointer"></i>
      </div>
    </div>
  </div>
</div>
