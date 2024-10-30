<!doctype html>
<html lang="en">
@include('includes.head')

<body id="top">
  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <!-- NAVBAR -->
    @include('includes.header')

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image"
      style="background-image: url('/frontend/images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Register</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Register</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section">
      <div class="container">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
        @endif

        <!-- Display error messages -->
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <div class="row">
          <div class="col-md-12 mb-5">
            <form action="{{ route('save') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <!-- Seleção de tipo de utilizador -->
              <div class="form-group">
                <label for="user_type">Sou:</label>
                <select class="form-control" id="user_type" name="user_type" required onchange="toggleUserFields()">
                  <option value="">Selecione...</option>
                  <option value="aluno">Aluno</option>
                  <option value="empresa">Empresa</option>
                </select>
              </div>

              <!-- Campos para todos os utilizadores -->
              <div class="form-group">
                <label for="name">Nome Completo</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>

              <div class="form-group">
                <label for="password_confirmation">Confirmar Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
              </div>

              <!-- Campos específicos para Alunos -->
              <div id="aluno_fields" style="display: none;">
                <div class="form-group">
                  <label for="telefone">Telefone</label>
                  <input type="text" class="form-control" id="telefone" name="telefone">
                </div>
                <div class="form-group">
                  <label for="foto">Foto do Aluno</label>
                  <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                </div>
                <div class="form-group">
                  <label for="curso">Curso</label>
                  <select class="form-control" id="curso" name="curso">
                    <option value="Animação Sociocultural">Animação Sociocultural</option>
                    <!-- Adicione outros cursos conforme necessário -->
                  </select>
                </div>
                <div class="form-group">
                  <label for="ano_conclusao">Ano de Conclusão dos Estudos</label>
                  <input type="text" class="form-control" id="ano_conclusao" name="ano_conclusao">
                </div>
                <div class="form-group">
                  <label for="curriculo">Currículo</label>
                  <input type="file" class="form-control" id="curriculo" name="curriculo" accept=".pdf,.doc,.docx">
                </div>
              </div>

              <!-- Campos específicos para Empresas -->
              <div id="empresa_fields" style="display: none;">
                <div class="form-group">
                  <label for="company_name">Nome da Empresa</label>
                  <input type="text" class="form-control" id="company_name" name="company_name">
                </div>
                <div class="form-group">
                  <label for="cidade">Cidade</label>
                  <input type="text" class="form-control" id="cidade" name="cidade">
                </div>
                <div class="form-group">
                  <label for="site">Site da Empresa (opcional)</label>
                  <input type="url" class="form-control" id="site" name="site">
                </div>
                <div class="form-group">
                  <label for="especializacao">Especialização da Empresa</label>
                  <input type="text" class="form-control" id="especializacao" name="especializacao">
                </div>
                <div class="form-group">
                  <label for="area_atuacao">Área de Atuação</label>
                  <input type="text" class="form-control" id="area_atuacao" name="area_atuacao">
                </div>
                <div class="form-group">
                  <label for="descricao">Descrição da Empresa</label>
                  <textarea class="form-control" id="descricao" name="descricao" rows="4"></textarea>
                </div>
                <div class="form-group">
                  <label for="logo">Logótipo da Empresa (opcional)</label>
                  <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                </div>
              </div>

              <button type="submit" class="btn btn-primary">Register</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    @include('includes.footer')
  </div>

  <!-- Script para exibir os campos específicos com base no tipo de utilizador selecionado -->
  <script>
    function toggleUserFields() {
      const userType = document.getElementById('user_type').value;
      document.getElementById('aluno_fields').style.display = userType === 'aluno' ? 'block' : 'none';
      document.getElementById('empresa_fields').style.display = userType === 'empresa' ? 'block' : 'none';
    }
  </script>
</body>

</html>
