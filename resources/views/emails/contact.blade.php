<form action="{{ route('contact.send') }}" method="POST" id="form-contact">
    @csrf

    <div class="f6">
        <label for="firstname">Nom*</label>
        <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" required>
        @error('firstname') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="f6">
        <label for="lastname">Prénom*</label>
        <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" required>
        @error('lastname') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="f6">
        <label for="email">Mail*</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        @error('email') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="f6">
        <label for="phone">Téléphone</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
    </div>

    <div class="f12">
        <label for="subject">Objet de votre demande*</label>
        <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required>
        @error('subject') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="clear"></div>

    <label for="content">Expliquez-nous votre besoin*</label>
    <textarea name="content" id="content" placeholder="Votre message ici..." required>{{ old('content') }}</textarea>
    @error('content') <span class="error">{{ $message }}</span> @enderror

    <!-- Champ honeypot anti-spam -->
    <input type="text" name="honeypot" id="honeypot" style="display:none;">

    <input type="submit" value="ENVOYER LE MESSAGE">
</form>

<!-- Message de confirmation -->
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
