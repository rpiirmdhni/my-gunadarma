<div
    x-data="{ show: false }"
    x-effect="
        document.querySelectorAll('[data-password]').forEach(el => {
            el.type = show ? 'text' : 'password';
        });
    "
    class="flex justify-start items-center gap-2 select-none"
>
    <label for='showpassword' class='flex justify-center items-center border border-gray-400 rounded-sm p-px cursor-pointer'>
        <input
            type='checkbox'
            id='showpassword'
            x-model='show'
            class='appearance-none checked:bg-[var(--primary)] p-2 rounded-sm transition-all duration-200 cursor-pointer'
        >
    </label>
    <label for='showpassword' class='text-base cursor-pointer'>Tampilkan Kata Sandi</label>
</div>
