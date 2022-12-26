@csrf

    <label>Nome:</label> 
    <input type="text" name="name" placeholder="Digite o Nome" value="{{ $user->name ?? old('name') }}">
    <!-- **Value é para persistir os dados. Ao dar error no formulário, irá ficar com os dados anteriores digitados -->
    <br/>

    <label>E-mail:</label>
    <input type="email" name="email" placeholder="Digite o E-mail" value="{{ $user->email ?? old('name') }}">
    <br/>
    
    <label>Senha:</label>
    <input type="password" name="password" placeholder="Digite a senha">
    <br/>

    