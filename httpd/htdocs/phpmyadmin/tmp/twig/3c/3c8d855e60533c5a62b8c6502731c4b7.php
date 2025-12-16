<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* server/replication/primary_replication.twig */
class __TwigTemplate_bb6e1b863a702f0d2a9ebf12601dcea1 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        if ( !($context["clear_screen"] ?? null)) {
            // line 2
            yield "  <div class=\"card mb-2\">
    <div class=\"card-header\">";
yield _gettext("Primary replication");
            // line 3
            yield "</div>
    <div class=\"card-body\">
    ";
yield _gettext("This server is configured as primary in a replication process.");
            // line 6
            yield "    <ul>
      <li>
        <a href=\"#primary_status_href\" id=\"primary_status_href\">
          ";
yield _gettext("Show primary status");
            // line 10
            yield "        </a>
        ";
            // line 11
            yield ($context["primary_status_table"] ?? null);
            yield "
      </li>
      <li>
        <p>
          <a href=\"#primary_replicas_href\" id=\"primary_replicas_href\">
            ";
yield _gettext("Show connected replicas");
            // line 17
            yield "          </a>
        </p>

        <div id=\"replication_replicas_section\" style=\"display: none;\">
          <table class=\"table w-auto\">
            <thead>
              <tr>
                <th>";
yield _gettext("Server ID");
            // line 24
            yield "</th>
                <th>";
yield _gettext("Host");
            // line 25
            yield "</th>
              </tr>
            </thead>
            <tbody>
              ";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["replicas"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["replica"]) {
                // line 30
                yield "                <tr>
                  <td class=\"text-end font-monospace\">";
                // line 31
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($__internal_compile_0 = $context["replica"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["Server_id"] ?? null) : null), "html", null, true);
                yield "</td>
                  <td class=\"text-end font-monospace\">";
                // line 32
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($__internal_compile_1 = $context["replica"]) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["Host"] ?? null) : null), "html", null, true);
                yield "</td>
                </tr>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['replica'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            yield "            </tbody>
          </table>
          <br>
          ";
            // line 38
            yield $this->env->getFilter('notice')->getCallable()(_gettext("Only replicas started with the --report-host=host_name option are visible in this list."));
            yield "
          <br>
        </div>
      </li>
      <li>
        <a href=\"";
            // line 43
            yield PhpMyAdmin\Url::getFromRoute("/server/replication");
            yield "\" data-post=\"";
            yield PhpMyAdmin\Url::getCommon(($context["url_params"] ?? null), "");
            yield "\" id=\"primary_addreplicauser_href\">
          ";
yield _gettext("Add replica replication user");
            // line 45
            yield "        </a>
      </li>
";
        }
        // line 48
        if (($context["primary_add_user"] ?? null)) {
            // line 49
            yield "    ";
            yield ($context["primary_add_replica_user"] ?? null);
            yield "
";
        } elseif ( !        // line 50
($context["clear_screen"] ?? null)) {
            // line 51
            yield "    </ul>
    </div>
  </div>
";
        }
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "server/replication/primary_replication.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  141 => 51,  139 => 50,  134 => 49,  132 => 48,  127 => 45,  120 => 43,  112 => 38,  107 => 35,  98 => 32,  94 => 31,  91 => 30,  87 => 29,  81 => 25,  77 => 24,  67 => 17,  58 => 11,  55 => 10,  49 => 6,  44 => 3,  40 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "server/replication/primary_replication.twig", "E:\\winLabrat\\Documents\\pslims\\amd64\\httpd\\htdocs\\phpmyadmin\\templates\\server\\replication\\primary_replication.twig");
    }
}
