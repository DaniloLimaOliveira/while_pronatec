<?php

/* admin\aula\aulaRegisterPartial.html.twig */
class __TwigTemplate_d8caa79b8019a130f9ef3d068309843b14317475631539f11abdf0da4b7c0cba extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin\\aula\\aulaRegisterPartial.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin\\aula\\aulaRegisterPartial.html.twig"));

        // line 1
        echo "<div class=\"form-group\">
    <label class=\"control-label required\">
        Tipo de Aula
    </label>
    <div class=\"sonata-ba-field sonata-ba-field-standard-natural\">
        <select name=\"tipoAula\" class=\"select2-chosen\">
            ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["TiposAula"]) || array_key_exists("TiposAula", $context) ? $context["TiposAula"] : (function () { throw new Twig_Error_Runtime('Variable "TiposAula" does not exist.', 7, $this->source); })()));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 8
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "\" ";
            echo (((twig_get_attribute($this->env, $this->source, (isset($context["Model"]) || array_key_exists("Model", $context) ? $context["Model"] : (function () { throw new Twig_Error_Runtime('Variable "Model" does not exist.', 8, $this->source); })()), "getTipoAula", array(), "method") == $context["value"])) ? ("selected") : (""));
            echo "> ";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo " </option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "        </select>
    </div>
</div>
<div class=\"form-group\">
    <label class=\"control-label required\">
        Quantidade de Horas
    </label>
    <div class=\"sonata-ba-field sonata-ba-field-standard-natural\">
        <input type=\"number\" name=\"quantidadeHoras\" required=\"required\" class=\"form-control\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Model"]) || array_key_exists("Model", $context) ? $context["Model"] : (function () { throw new Twig_Error_Runtime('Variable "Model" does not exist.', 18, $this->source); })()), "getQuantidadeHoras", array(), "method"), "html", null, true);
        echo "\" maxlength=\"2\"/>
    </div>
</div>
<div class=\"form-group\">
    <label class=\"control-label required\">
        Conteúdo Ministrado
    </label>
    <div class=\"sonata-ba-field sonata-ba-field-standard-natural\">
        <input type=\"text\" name=\"conteudoMinistrado\" required=\"required\" class=\"form-control\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Model"]) || array_key_exists("Model", $context) ? $context["Model"] : (function () { throw new Twig_Error_Runtime('Variable "Model" does not exist.', 26, $this->source); })()), "getConteudoMinistrado", array(), "method"), "html", null, true);
        echo "\" maxlength=\"255\"/>
    </div>
</div>

";
        // line 30
        $this->loadTemplate("admin/aula/frequenciaRegisterPartial.html.twig", "admin\\aula\\aulaRegisterPartial.html.twig", 30)->display(array_merge($context, array("Model" => twig_get_attribute($this->env, $this->source,         // line 31
(isset($context["Model"]) || array_key_exists("Model", $context) ? $context["Model"] : (function () { throw new Twig_Error_Runtime('Variable "Model" does not exist.', 31, $this->source); })()), "getFrequencias", array(), "method"))));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "admin\\aula\\aulaRegisterPartial.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 31,  82 => 30,  75 => 26,  64 => 18,  54 => 10,  41 => 8,  37 => 7,  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"form-group\">
    <label class=\"control-label required\">
        Tipo de Aula
    </label>
    <div class=\"sonata-ba-field sonata-ba-field-standard-natural\">
        <select name=\"tipoAula\" class=\"select2-chosen\">
            {% for key,value in TiposAula %}
                    <option value=\"{{value}}\" {{ ( Model.getTipoAula() == value) ? 'selected' : '' }}> {{key}} </option>
            {% endfor %}
        </select>
    </div>
</div>
<div class=\"form-group\">
    <label class=\"control-label required\">
        Quantidade de Horas
    </label>
    <div class=\"sonata-ba-field sonata-ba-field-standard-natural\">
        <input type=\"number\" name=\"quantidadeHoras\" required=\"required\" class=\"form-control\" value=\"{{ Model.getQuantidadeHoras() }}\" maxlength=\"2\"/>
    </div>
</div>
<div class=\"form-group\">
    <label class=\"control-label required\">
        Conteúdo Ministrado
    </label>
    <div class=\"sonata-ba-field sonata-ba-field-standard-natural\">
        <input type=\"text\" name=\"conteudoMinistrado\" required=\"required\" class=\"form-control\" value=\"{{ Model.getConteudoMinistrado() }}\" maxlength=\"255\"/>
    </div>
</div>

{% include 'admin/aula/frequenciaRegisterPartial.html.twig'
    with {  'Model': Model.getFrequencias() }
%}", "admin\\aula\\aulaRegisterPartial.html.twig", "C:\\Pronatec\\pronatec\\templates\\admin\\aula\\aulaRegisterPartial.html.twig");
    }
}
