@section('title', 'To-Do List')
<x-app-layout>
	<div class="flex flex-col justify-center items-start gap-4 w-full">
		<div class="flex flex-col justify-center items-start gap-2">
			<h3 class="text-4xl 2xl:text-5xl font-bold">To-Do List</h3>
			<p class="text-[var(--surface-variant)]">Selesaikan pekerjaan dengan fitur daftar tugas</p>
		</div>
		<div class="flex justify-end items-center w-full">
			<button type="button" @click="showModalTodoListAdd = true"
				class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] px-5 py-3 flex justify-between items-center gap-2 rounded-full cursor-pointer transition duration-150 ease-in-out">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
					class="h-[26px] w-[26px] 2xl:h-[26px] 2xl:w-[26px] fill-white">
					<path
						d="M445.93-445.93H194.02v-68.14h251.91v-252.15h68.14v252.15h252.15v68.14H514.07v251.91h-68.14v-251.91Z" />
				</svg>
				<span class="text-base 2xl:text-lg text-white">Tambah</span>
			</button>
		</div>
	</div>
	<div class="flex flex-col justify-center items-start gap-4 w-full">
		<div class="grid grid-cols-1 2xl:grid-cols-3 gap-4 w-full">
			@foreach ($todos as $todo)
			<div x-data="{ showModalTodoListEdit_{{ $todo->id }}: false }">
				{{-- CARD --}}
				<button type="button" @click="showModalTodoListEdit_{{ $todo->id }} = true"
					class="col-span-2 2xl:col-span-1 bg-[var(--secondary)] hover:bg-[var(--hover-secondary)] focus:bg-[var(--focus-secondary)] active:bg-[var(--active-secondary)]
					p-4 flex flex-col justify-center items-center gap-4 rounded-2xl cursor-pointer transition duration-150 ease-in-out w-full">
					<div class="grid grid-cols-1 gap-4 w-full">
						<div class="flex justify-between items-center gap-4">
							<h3 class="text-2xl 2xl:text-4xl font-medium text-left">
								{{ $todo->title }}
							</h3>
							{{-- STATUS BADGE --}}
							@php
							$statusColors = [
							'0' => 'bg-yellow-600', // Pending
							'1' => 'bg-blue-600', // On Progress
							'2' => 'bg-green-600', // Done
							'3' => 'bg-red-600', // Cancelled
							];
							$statusLabels = [
							'0' => 'Pending',
							'1' => 'On Progress',
							'2' => 'Done',
							'3' => 'Canceled',
							];
							@endphp
							<span
								class="{{ $statusColors[$todo->status] }} px-3 py-px rounded-md text-white text-sm">
							{{ $statusLabels[$todo->status] }}
							</span>
						</div>
						<p class="text-sm mb-0 text-left">
							{{ $todo->desc ?? 'Tidak ada deskripsi.' }}
						</p>
						<div class="flex justify-between items-center gap-1 w-full">
							<div class="flex flex-col justify-center items-start gap-1">
								<span class="font-medium text-sm 2xl:text-base">Tenggat
								Waktu</span>
								<span class="text-base 2xl:text-base">
								{{ $todo->deadline->translatedFormat('d F Y') }}
								</span>
							</div>
							{{-- PRIORITY --}}
							@php
							$priorityMap = [
							'0' => ['Unknown', 'bg-gray-600'],
							'1' => ['Low', 'bg-green-600'],
							'2' => ['Medium', 'bg-blue-600'],
							'3' => ['High', 'bg-orange-600'],
							'4' => ['Urgent', 'bg-red-600'],
							];
							[$priorityText, $priorityColor] = $priorityMap[$todo->priority];
							@endphp
							<div class="flex flex-col justify-center items-end gap-1">
								<span class="font-medium text-sm 2xl:text-base"> Prioritas</span>
								<span
									class="{{ $priorityColor }} px-3 py-px rounded-md text-white text-lg 2xl:text-xl">
								{{ $priorityText }}
								</span>
							</div>
						</div>
					</div>
				</button>
				{{-- MODAL --}}
				<div x-show="showModalTodoListEdit_{{ $todo->id }} && !splash"
					@click.self="showModalTodoListEdit_{{ $todo->id }} = false"
					x-transition.opacity
					class="fixed inset-0 p-4 !z-[9999] flex justify-center items-center bg-black/50"
					x-cloak>
					<form action="/todolist/{{ $todo->id }}" method="POST"
						class="bg-white min-w-full max-w-full 2xl:min-w-xl 2xl:max-w-xl rounded-3xl flex flex-col"
						@click.stop>
						@csrf
						@method('PUT')
						<div class="flex justify-between items-center gap-2 p-6">
							<span class="text-2xl">Edit To-Do</span>
						</div>
						<div class="flex flex-col justify-center items-start gap-4 px-6">
							{{-- TITLE --}}
							<div class="relative group w-full">
								<input type="text" id="title" name="title"
									placeholder=" " value="{{ $todo->title }}"
									class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
									focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
									required />
								<label for="title"
                            class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                    group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                    group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                            Judul
                        </label>
							</div>
							{{-- DESC --}}
							<div class="relative group w-full">
								<textarea id="desc" name="desc" placeholder=" "
									class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
									focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200">{{ $todo->desc }}</textarea>
								<label for="desc"
                            class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                    group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                    group-has-[textarea:not(:placeholder-shown)]:top-0 group-has-[textarea:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                            Deskripsi
                        </label>
							</div>
							{{-- DEADLINE + PRIORITY --}}
							<div class="grid grid-cols-2 gap-4 w-full">
								{{-- DEADLINE --}}
								<div class="relative group w-full">
									<input type="date" id="deadline" name="deadline"
										placeholder=" "
										value="{{ $todo->deadline->format('Y-m-d') }}"
										class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
										focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
										required />
									<label for="deadline"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                        group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                        group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                Tenggat Waktu
                            </label>
								</div>
								{{-- PRIORITY --}}
								<div class="relative group w-full">
									<select id="priority" name="priority"
										class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
										focus:border-[var(--primary)] focus:ring-0 outline-none cursor-pointer transition-all duration-200"
										required>
									<option value="0" @selected($todo->priority == '0')>Unknown
									</option>
									<option value="1" @selected($todo->priority == '1')>Low
									</option>
									<option value="2" @selected($todo->priority == '2')>Medium
									</option>
									<option value="3" @selected($todo->priority == '3')>High
									</option>
									<option value="4" @selected($todo->priority == '4')>Urgent
									</option>
									</select>
									<label for="priority"
                                class="absolute left-2 top-0 -translate-y-1/2 text-gray-400 text-xs bg-white px-1.5 transition-all duration-200 cursor-text
                        group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                        group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                Prioritas
                            </label>
								</div>
							</div>
							{{-- STATUS --}}
							<div class="relative group w-full">
								<select id="status" name="status"
									class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
									focus:border-[var(--primary)] focus:ring-0 outline-none cursor-pointer transition-all duration-200"
									required>
								<option value="0" @selected($todo->status == '0')>Pending
								</option>
								<option value="1" @selected($todo->status == '1')>On Progress
								</option>
								<option value="2" @selected($todo->status == '2')>Done
								</option>
								<option value="3" @selected($todo->status == '3')>Canceled
								</option>
								</select>
								<label for="status"
                            class="absolute left-2 top-0 -translate-y-1/2 text-gray-400 text-xs bg-white px-1.5 transition-all duration-200 cursor-text
                    group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                    group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                            Status
                        </label>
							</div>
						</div>
						{{-- BUTTONS --}}
						<div class="flex justify-between items-center gap-4 p-6">
                            <form action="{{ route('todolist.destroy', $todo->id) }}" method="post" class="w-full 2xl:w-auto">
                                @csrf
                                @method('delete')
                                <div class="flex justify-start items-center gap-2">
                                    <button type="submit" @click="splash = true"
                                        class="bg-[var(--error)] hover:bg-[var(--hover-error)] focus:bg-[var(--focus-error)] active:bg-[var(--active-error)]
                                        flex justify-center items-center px-3 2xl:px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out w-full 2xl:w-auto">
                                        <div class="flex justify-center items-center text-base text-white gap-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" class="block 2xl:hidden fill-white"><path d="M265.18-113.3q-31.56 0-53.74-22.13-22.17-22.13-22.17-53.63v-548.79h-45.21v-75.75h203.4v-38.04h264.76v38.04h203.72v75.75h-45.21v548.79q0 31-22.42 53.38-22.43 22.38-53.49 22.38H265.18Zm429.64-624.55H265.18v548.79h429.64v-548.79ZM361.16-270.91h71.21v-386h-71.21v386Zm166.47 0H599v-386h-71.37v386ZM265.18-737.85v548.79-548.79Z"/></svg>
                                            <span class="hidden 2xl:block">Hapus</span>
                                        </div>
                                    </button>
                                </div>
                            </form>
                            <div class="flex justify-end items-center gap-2">
                                <button type="button"
                                    @click="showModalTodoListEdit_{{ $todo->id }} = false"
                                    class="bg-transparent hover:bg-[var(--hover-tertiary)]/50 focus:bg-[var(--focus-tertiary)]/50 active:bg-[var(--active-tertiary)]/50
                                    flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out w-full 2xl:w-auto">
                                <span class="text-base">Tutup</span>
                                </button>
                                <button type="submit"
                                    class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)]
                                    flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out w-full 2xl:w-auto">
                                <span class="text-base text-white">Simpan</span>
                                </button>
                            </div>
                        </div>
					</form>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</x-app-layout>
